<?php
namespace app\user\controller;
use app\user\model\Payment;
use app\user\model\Picture;
use app\admin\model\Config;
use app\user\model\ShowerMsg;
use think\Controller;
use think\facade\Request;
// 指定允许其他域名访问
header('Access-Control-Allow-Origin:*');
// 响应类型
header('Access-Control-Allow-Methods:*');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with,content-type');
/*
 * 用于展示历史上墙信息
 * version 1.0
 */
class History extends Controller{
    /*
     * 入口函数
     * version 1.0
     * 请求方式 get
     */
    public function index(){
        $query = ShowerMsg::where('age',18);
        $data = ShowerMsg::getOpenData($query,'history');
        $return_data = ShowerMsg::getPrivateData($data)->select();


        return msg(0,'ok',$return_data);
    }
    public function episode(){
        $query = Config::limit(1)->find();
        $history =  $query->history;
        return msg(0,'ok',$history);
    }

    public function search()
    {
        $openid = Request::param('openid');
        $maxage = Request::param('maxage');
        $minage = Request::param('minage');
        $maxheight = Request::param('maxheight');
        $minheight = Request::param('minheight');
        $place = Request::param('place');
        $episode = Request::param('episode');
        $school = Request::param('school');


        $query = ShowerMsg::where('pass', 1)->where('history','not null');

        if (is_numeric($maxage) && is_numeric($minage))

            $query->where('age', 'between', [$minage, $maxage]);
        //echo $query->getLastSql();
        if (is_numeric($maxheight) && is_numeric($minheight))
            $query->where('height', 'between', [$minheight, $maxheight]);
        //echo $query->getLastSql();
        if ($place!='')
            $query->where('location', $place);
        //echo $query->getLastSql();
        if (is_numeric($episode))
            $query->where('history', $episode);
        //echo $query->getLastSql();
        if ($school!= '')
            $query->where('school', $school);
        //echo $query->getLastSql();

        //选出符合条件的IDs数组，并且pass =1
        $IDs = $query->order('history', 'desc')->column('ID');


        $count = 0;
        $return_data=[];
        foreach ($IDs as $ID) {
            $data = Payment::where('actor', $ID)->where('openid', $openid)->where('ispay', 1)->find();
            if ($data != null) {
                $res = ShowerMsg::where('ID', $ID);
                $return_data[$count] = ShowerMsg::getPrivateAndOpenData($res, 'history')->find();
                $return_data[$count]['ispay']=1;
                $return_data[$count]['number']=$count+1;
                $return_data[$count]['image'] = Picture::field('address')->where('ID', $ID)->where('type',0)->select();
                foreach ($return_data[$count]['image'] as $key => $vaule) {
                    //vaule ="{\"address\":\"20201222\\/07316443315b68108d9f7d1299f88777.png\"}
                    $vaule = json_decode($vaule, true);
                    $return_data[$count]['image'][$key] = PREFIX . $vaule['address'];

                }
            } else {
                $res = ShowerMsg::where('ID', $ID);
                $return_data[$count] = ShowerMsg::getPrivateAndOpenData($res, 'history')->find();
                $return_data[$count]['ispay']=0;
                $return_data[$count]['number']=$count+1;
                $return_data[$count]['image'] = Picture::field('address')->where('ID', $ID)->where('type',0)->select();
                foreach ($return_data[$count]['image'] as $key => $vaule) {
                    //vaule ="{\"address\":\"20201222\\/07316443315b68108d9f7d1299f88777.png\"}
                    $vaule = json_decode($vaule, true);
                    $return_data[$count]['image'][$key] = PREFIX . $vaule['address'];

                }


            }
            $count++;
        }
        //echo $query->getLastSql();

        return msg(0, 'ok', $return_data);
    }





}