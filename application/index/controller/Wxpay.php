<?php
namespace app\index\controller;

use think\Controller;
use think\facade\Request;

class Wxpay extends Controller{
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

    public function build(){
        $openid = Request::param('openid');
        if(empty($openid))
            return msg (-1,'empty openid');

        $arr =[
            'appid' =>APP_ID,
            'mch_id'=>MCH_ID,
            'nonce_str'=>md5(time().'random'),
            'body'=>'成都高校脱单科技有限公司-用户信息',
            'out_trade_no'=>'1234',//内部订单号
            'total_fee'=>1,
            'spbill_create_ip'=>$_SERVER['REMOTE_ADDR'],
            'notify_url'=>NOTIFY_URL,//返回信息的url
            'trade_type'=>'JSAPI',
            'openid'=>$openid//用户openid 如ontNP6MT8n-UiTxgiVTnmc94W29o
        ];
        $arr = $this->setSign($arr);

        $xml =$this->xml_encode($arr);

        $res_data =$this->PostXml(POST_URL,$xml);
        $data =$this->XmlToArr($res_data);
        print_r($data);
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
        if(is_array($arr) || count($arr)==0)
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


}

