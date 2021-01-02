<?php

namespace app\index\controller;

use app\index\model\Payment;
use app\index\model\ShowerMsg;
use app\user\model\Option;
use Cassandra\Time;
use think\Controller;
use think\facade\Request;
// 指定允许其他域名访问
header('Access-Control-Allow-Origin:*');
// 响应类型
header('Access-Control-Allow-Methods:*');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with,content-type');
class Wxpay extends Controller{
/*
 * 前端先调用build，并发送购买者openid，被查看者的openid
 * 后端先检查openid合理性，并在payment表创建预订单（ispay=0）
 * 前端继续调用getJsParam申请JSAPI，引导用户完成支付
 * 完成支付后，异步通知后端并完成订单（ispay=1）
 * 改进：可以前端只调用getJSParam，并发送购买者openid，被查看者的openid，便可完成订单
 */

    /*
     * 构建订单
     */
    public function build($openid,$actorID,$msg){
        $data = new Payment();
        $ID = time();
        $data->ID = $ID;
        $data->openid =$openid;
        $data->actor =$actorID;
        $data->amount =FEE;
        $data->save();
        $arr =[
            'appid' =>APP_ID,
            'mch_id'=>MCH_ID,
            'nonce_str'=>md5(time().'random'),
            'body'=>'成都高校脱单科技有限公司-用户信息',
            'out_trade_no'=>$ID,//内部订单号,待修改
            'total_fee'=>FEE,//可以设为常量，添加到common.php
            'spbill_create_ip'=>$_SERVER['REMOTE_ADDR'],
            'notify_url'=>NOTIFY_URL,//返回信息的url
            'trade_type'=>'JSAPI',
            'openid'=>$openid//用户openid 如ontNP6MT8n-UiTxgiVTnmc94W29o
        ];
        $arr = $this->setSign($arr);

        $xml =$this->xml_encode($arr);

        $res_data =$this->PostXml(POST_URL,$xml);
        $data =$this->XmlToArr($res_data);

        return $this->getPrepayId($data);
    }

    /*
     * 获取签名
     */
    public function getSign($arr){
        //去掉空值
        $arr =array_filter($arr);
        //按ASCII排列键
        ksort($arr);
        $str =urldecode(http_build_query($arr)).'&key='.API_SECRET;
        return strtoupper(md5($str));
    }

    public function setSign($arr){
        $sign = $this ->getSign($arr);
        $arr['sign'] =$sign;
        return $arr;
    }

    /*
     * 传入数据数组，返回XML格式的待上传文件
     */
    function xml_encode($arr) {
        if(!is_array($arr) || count($arr)==0)
            return '';

        $xml ="<xml>";
        foreach ($arr as $key =>$value){
            if(is_numeric($value)){
                $xml .="<".$key.">".$value."</".$key.">";
            }else{
                $xml .="<".$key."><![CDATA[".$value."]]></".$key.">";
            }
        }
        $xml.="</xml>";
        return $xml;
    }
    public function XmlToArr($xml){
        if($xml==''){
            return '';
        }
        libxml_disable_entity_loader(true);
        $arr =json_decode(json_encode(simplexml_load_string($xml,'SimpleXMLElement',LIBXML_NOCDATA)),true);
        return $arr;
    }
    /*
 * 接收openid与订单信息，构造请求，向微信服务器发送预订单
 */
    public function PostXml($url,$postfields){

        $ch =curl_init();
        $param[CURLOPT_URL] =$url;
        $param[CURLOPT_HEADER]=false;
        $param[CURLOPT_RETURNTRANSFER]=true;
        $param[CURLOPT_FOLLOWLOCATION]=true;
        $param[CURLOPT_POST]=true;
        $param[CURLOPT_POSTFIELDS] =$postfields;
        $param[CURLOPT_SSL_VERIFYHOST]=false;
        $param[CURLOPT_SSL_VERIFYPEER]=false;



        curl_setopt_array($ch,$param);
        $content =curl_exec($ch);
        curl_close($ch);
        return $content;
    }
    public function getPrepayId($arr){


        return $arr['prepay_id'];

    }
    public function getJsParam(){
        $openid = Request::param('openid');
        $actorID = Request::param('actorid');
        if (empty($openid))
            return msg(-1,'empty openid');
        if(empty($actorID))
            return msg(-1,'empty actorid');

        $data = ShowerMsg::where('ID',$actorID)->where('pass',1)->where('history','not null')->find();
        if(empty($data)){
            return msg(-1,'no such actor');
        }
        $msg = '第'.$data->history.'期'.$data->name.'嘉宾';

        $prepayID = $this->build($openid,$actorID,$msg);

        if(empty($prepayID))
            return msg(-1,'wrong');

        $param =[
            'appId'=>APP_ID,
            'timeStamp'=>time(),
            'nonceStr'=>md5(time()),
            'package'=>'prepay_id='.$prepayID,
            'signType'=>'MD5'
        ];
        $param['paySign']=$this->getSign($param);
        return json_encode($param);
    }
    /*
     * 用于验证签名
     */
    public function checkSign($arr){
        $sign = $this->getSign($arr);
        if($sign == $arr['sign']){
            return true;
        }else{
            return false;
        }
    }

    /*
  * 用于查看订单完成情况
  */
    public function notify(){

        $xmlDATA = $GLOBALS['HTTP_RAW_POST_DATA'];
        $arr =$this->XmlToArr($xmlDATA);
        if(empty($arr)){
            $url="http://www.scgxtd.cn/public/index/wxpay/tell";
            $msg ="noxml";
            $url.="?msg=".$msg;
            header("Location:$url");
            exit();
            return msg(-1,'empty xml');
        }
        if($this->checkSign($arr)){
            if($arr['return_code']=='SUCCESS' && $arr['result_code']=='SUCCESS'){
                if($arr['total_fee']==FEE){
                    //内部订单号
                    $query = Payment::where('ID', $arr['out_trade_no'])->find();
                    //成功支付，并修改payment的ispay =1
                    $query->ispay = 1;
                    //微信支付订单号
                    $query->wxid = $arr['transaction_id'];
                    //确保save方法是更新
                    $query->ID = $arr['out_trade_no'];
                    $query->save();
                    $url="http://www.scgxtd.cn/public/index/wxpay/tell";
                    $msg ="saveOK";
                    $url.="?msg=".$msg;
                    header("Location:$url");
                    exit();
                    $return_params=[
                        'return_code'=>'SUCCESS',
                        'return_msg'=>'OK'
                    ];
                    echo $this->xml_encode($return_params);
                }else{
                    $url="http://www.scgxtd.cn/public/index/wxpay/tell";
                    $msg ="amountwrong";
                    $url.="?msg=".$msg;
                    header("Location:$url");
                    exit();
                    return msg(-1,'amount wrong');
                }
            }else{
                $url="http://www.scgxtd.cn/public/index/wxpay/tell";
                $msg ="signwrong";
                $url.="?msg=".$msg;
                header("Location:$url");
                exit();
                return msg(-1,'business wrong');
            }
        }else{
            $url="http://www.scgxtd.cn/public/index/wxpay/tell";
            $msg ="signwrong";
            $url .="?msg=".$msg;
            header("Location:$url");
            exit();
            return msg(-1,'sign wrong');
        }



    }
    public function tell(){
        $msg = Request::param('msg');
        $data = new Option();
        $data->content = $msg;
        $data->contact =$msg;
        $data->save();

        echo $msg;
    }




}

