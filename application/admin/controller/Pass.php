<?php
namespace app\admin\controller;
use app\user\model\ShowerMsg;
use think\Controller;
use think\facade\Request;
use think\facade\Cookie;
use app\admin\model\Adminuser;
class Pass extends Controller{
    public function index(){
        //用于通过审核

        //待添加登录逻辑


        if(empty(Request::param('ID')))
            return msg(-1,'empty ID');
        $ID = Request::param('ID');
        $query = ShowerMsg::where('ID',$ID)->find();
        if(empty($query))
            return msg (-1,'no such actor');

        $query->pass = 1;
        $query->save();
        if($query===false)
            return msg(-1,'pass update fail');

        return msg(0,'ok');
    }
    public function check(){
        //返回待审核的列表

        //待添加登录逻辑

        $query1 = ShowerMsg::where('pass',0);
        $query2 = ShowerMsg::getOpenData($query1);
        $query3 = ShowerMsg::getPrivateData($query2);
        $datas =$query3->select();

        return msg (0,'ok',$datas);


    }

}