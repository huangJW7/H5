<?php
namespace app\user\controller;

use app\user\model\ShowerMsg;
use think\Controller;
use think\Facade\Request;

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


        $datas = ShowerMsg::where();
    }
}