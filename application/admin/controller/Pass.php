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
        //登录逻辑
        if(!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if($jwt_data === NULL)
            return msg(-10);

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
    public function check()
    {
        //返回待审核与通过审核的列表

        //待添加登录逻辑
        if (!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if ($jwt_data === NULL)
            return msg(-10);

        $type = Request::param('type');
        $pass = Request::param('pass');
        if (!isset($type))
            return msg(-1, 'empty type');
        if(!isset($pass)){
            return msg(-1,'pass empty');
        }

        $count = 0;
        $return_data = [];
        if($pass == 1){
            if ($type == 1) {
                $IDs = ShowerMsg::where('pass', 1)->where('type', 1)->where('history',null)->column('ID');
                foreach ($IDs as $ID) {
                    $res = ShowerMsg::where('ID', $ID);
                    $return_data[$count] = ShowerMsg::getPrivateAndOpenData($res)->find();
                    $return_data[$count]['image'] = Picture::field('address')->where('ID', $ID)->select();
                    foreach ($return_data[$count]['image'] as $key => $vaule) {
                        //vaule ="{\"address\":\"20201222\\/07316443315b68108d9f7d1299f88777.png\"}
                        $vaule = json_decode($vaule, true);
                        $return_data[$count]['image'][$key] = PREFIX . $vaule['address'];
                    }
                    $count++;
                }
            }

            if ($type == 0) {
                $IDs = ShowerMsg::where('pass',1)->where('type', 0)->where('history',null)->column('ID');
                foreach ($IDs as $ID) {
                    $res = ShowerMsg::where('ID', $ID);
                    $return_data[$count] = ShowerMsg::getPrivateAndOpenData($res)->find();
                    $return_data[$count]['image'] = Picture::field('address')->where('ID', $ID)->select();
                    foreach ($return_data[$count]['image'] as $key => $vaule) {
                        //vaule ="{\"address\":\"20201222\\/07316443315b68108d9f7d1299f88777.png\"}
                        $vaule = json_decode($vaule, true);
                        $return_data[$count]['image'][$key] = PREFIX . $vaule['address'];
                    }
                    $count++;
                }
            }
        }
        if($pass == 0){
            if ($type == 1) {
                $IDs = ShowerMsg::where('pass', 0)->where('type', 1)->column('ID');
                foreach ($IDs as $ID) {
                    $res = ShowerMsg::where('ID', $ID);
                    $return_data[$count] = ShowerMsg::getPrivateAndOpenData($res)->find();
                    $return_data[$count]['image'] = Picture::field('address')->where('ID', $ID)->select();
                    foreach ($return_data[$count]['image'] as $key => $vaule) {
                        //vaule ="{\"address\":\"20201222\\/07316443315b68108d9f7d1299f88777.png\"}
                        $vaule = json_decode($vaule, true);
                        $return_data[$count]['image'][$key] = PREFIX . $vaule['address'];
                    }
                    $count++;
                }
            }

            if ($type == 0) {
                $IDs = ShowerMsg::where('pass', 0)->where('type', 0)->column('ID');
                foreach ($IDs as $ID) {
                    $res = ShowerMsg::where('ID', $ID);
                    $return_data[$count] = ShowerMsg::getPrivateAndOpenData($res)->find();
                    $return_data[$count]['image'] = Picture::field('address')->where('ID', $ID)->select();
                    foreach ($return_data[$count]['image'] as $key => $vaule) {
                        //vaule ="{\"address\":\"20201222\\/07316443315b68108d9f7d1299f88777.png\"}
                        $vaule = json_decode($vaule, true);
                        $return_data[$count]['image'][$key] = PREFIX . $vaule['address'];
                    }
                    $count++;
                }
            }
        }

        return msg(0,'ok',$return_data);
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
                foreach ($data[$count1]['image'] as $key => $vaule){
                    //vaule ="{\"address\":\"20201222\\/07316443315b68108d9f7d1299f88777.png\"}
                    $vaule = json_decode($vaule,true);
                    $data[$count1]['image'][$key] = PREFIX.$vaule['address'];
                    $count2+=1;
                }
                $count1 += 1;
            }
            return msg(0, 'ok', $data);
        }

    }
    public function downWall(){
        if (!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if ($jwt_data === NULL)
            return msg(-10);

        $openid = Request::param('openid');
        $type = Request::param('type');
        if(empty($openid)){
            return msg (-1,'empty openid');
        }
        if(!isset($type))
        $query= ShowerMsg::where('ID',$openid)->where('type',$type)->find();
        $query ->pass = -1;
        $query->save();
        if(empty($query)){
            return msg(-1,'downWall failed');

        }
        if (!empty($query)){
            return msg(0,'ok');
        }
    }

}