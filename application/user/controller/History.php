<?php
namespace app\user\controller;
use app\user\model\Payment;
use think\Db;
use app\user\model\ShowerMsg;
use think\Controller;
use think\facade\Request;

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
    public function search(){
        $openid =Request::param('openid');
        $maxage =Request::param('maxage');
        $minage =Request::param('minage');
        $maxheight = Request::param('maxheight');
        $minheight = Request::param('minheight');
        $place = Request::param('place');
        $episode =Request::param('episode');
        $school =Request::param('school');

        //
        $query = ShowerMsg::where('pass',1);

        if(isset($maxage) and isset($minage))

            $query->where('age','between',[$minage,$maxage]);
            //echo $query->getLastSql();
        if(isset($maxheight) and isset($minheight))
            $query->where('height','between',[$minheight,$maxheight]);
            //echo $query->getLastSql();
        if(isset($place))
            $query->where('location',$place);
            //echo $query->getLastSql();
        if(isset($episode))
            $query->where('history',$episode);
            //echo $query->getLastSql();
        if(isset($school))
            $query->where('school',$school);
            //echo $query->getLastSql();
        $res_query =$query;
        //选出符合条件的IDs数组，并且pass =1
        $IDs = $query->column('ID');


        $count = 0;
        foreach ($IDs as $ID){
            $data =Payment::where('actor',$ID)->where('openid',$openid)->where('ispay',1)->find();
            if($data != null){
                $res =ShowerMsg::where('ID',$ID);
                $return_data[$count] = ShowerMsg::getPrivateAndOpenData($res,'history')->find();
            }else{
                $res = ShowerMsg::where('ID',$ID);
                $return_data[$count] = ShowerMsg::getOpenData($res,'history')->find();

            }
            $count++;

        }
        //echo $query->getLastSql();

        return msg(0,'ok',$return_data);


    }


}