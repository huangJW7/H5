<?php
namespace app\admin\controller;
use app\user\model\Picture;
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
        $type = Request::param('type');
        if($type <=1 ) {

            $query1 = ShowerMsg::where('pass', 0)->where('type', $type);
            $query2 = ShowerMsg::getOpenData($query1);
            $query3 = ShowerMsg::getPrivateData($query2);
            $datas = $query3->select();
            return msg(0, 'ok', $datas);
        }
    }
    public function check_image(){
        //返回待审核的图片列表
        $type = Request::param('type');
        if($type <=1) {

            $IDs = ShowerMsg::field('ID')->where('pass', 0)->where('type', $type)->select();
            $count1 = 0;

            $data=null;
            foreach ($IDs as $ID) {
                $count2 = 0;
                $data[$count1]['ID'] = $ID['ID'];
                $data[$count1]['image'] = Picture::field('address')->where('ID', $ID['ID'])->select();
                foreach ($data[$count1]['image'] as $key[$keygen] => $vaule){
                    $data[$count1]['image'][$count2] = PREFIX.$vaule;
                    $count2+=1;
                }
                $count1 += 1;
            }
            return msg(0, 'ok', $data);
        }

    }

}