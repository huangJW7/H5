<?php
namespace app\user\controller;
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

        $data=ShowerMsg::getOpenData($query)->select();
        //echo $query->getLastSql();
        if(empty($data))
            echo 'get open data fail';
        return msg(0,'ok',$data);


    }


}