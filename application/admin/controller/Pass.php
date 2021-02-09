<?php
namespace app\admin\controller;
use app\user\model\Matcher;
use app\user\model\Option;
use app\user\model\Picture;
use app\user\model\ShowerMsg;
use think\Controller;
use think\Db;
use think\facade\Request;
use think\facade\Cookie;
use app\admin\model\Adminuser;

// 指定允许其他域名访问
header('Access-Control-Allow-Origin:*');
// 响应类型
header('Access-Control-Allow-Methods:*');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with,content-type');
class Pass extends Controller{


    public function getsuggestion(){
        //展示意见情况
//        if(!Cookie::has('jwt_admin'))
//            return msg(-10);
//        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
//        if($jwt_data === NULL)
//            return msg(-10);

        $return_datas = Option::where('status',0)->select();
        return msg(0,'ok',$return_datas);

    }

    public function dealsuggestion(){

        if(!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if($jwt_data === NULL)
            return msg(-10);
        //意见编号
        $ID = Request::param('ID');
        $query = Option::where('ID',$ID)->find();
        $query ->status = 1;
        $query->save();

        if(!empty($query)){
            return msg(0,'ok');

        }else{
            return msg(-1,'deal wrong');
        }


    }
    public function normal(){
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
    public function active(){
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
        $query = Matcher::where('ID',$ID)->find();
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
                $IDs = Matcher::where('pass', 1)->where('type', 1)->where('history',null)->column('ID');
                foreach ($IDs as $ID) {
                    $res = Matcher::where('ID', $ID);
                    $return_data[$count] = Matcher::getPrivateAndOpenData($res)->find();
                    $return_data[$count]['image'] = Picture::field('address')->where('ID', $ID)->where('type', 1)->select();
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
                    $return_data[$count]['image'] = Picture::field('address')->where('ID', $ID)->where('type', 0)->select();
                    foreach ($return_data[$count]['image'] as $key => $vaule) {
                        //vaule ="{\"address\":\"20201222\\/07316443315b68108d9f7d1299f88777.png\"}
                        $vaule = json_decode($vaule, true);
                        $return_data[$count]['image']['name'] =$vaule['address'];
                        $return_data[$count]['image']['url'] = PREFIX . $vaule['address'];
                    }
                    $return_data[$count]['background']=Picture::field('address')->where('ID', $ID)->where('type', 2)->find();

                    if(!empty($return_data[$count]['background'])){
                        $return_data[$count]['background'] = json_decode($return_data[$count]['background'], true);
                        $return_data[$count]['background']['name']=$return_data[$count]['background']['address'];
                        $return_data[$count]['background']['url'] = PREFIX . $return_data[$count]['background']['address'];
                    }
                    $count++;
                }
            }
        }
        if($pass == 0){
            if ($type == 1) {
                $IDs = Matcher::where('pass', 0)->where('type', 1)->column('ID');
                foreach ($IDs as $ID) {
                    $res = Matcher::where('ID', $ID);
                    $return_data[$count] = Matcher::getPrivateAndOpenData($res)->find();
                    $return_data[$count]['image'] = Picture::field('address')->where('ID', $ID)->where('type', 1)->select();
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
                    $return_data[$count]['image'] = Picture::field('address')->where('ID', $ID)->where('type', 0)->select();

                    foreach ($return_data[$count]['image'] as $key => $vaule) {
                        //vaule ="{\"address\":\"20201222\\/07316443315b68108d9f7d1299f88777.png\"}
                        $vaule = json_decode($vaule, true);
                        $return_data[$count]['image']['name'] =$vaule['address'];
                        $return_data[$count]['image']['url'] = PREFIX . $vaule['address'];
                    }
                    $datas=Picture::where('ID',$ID)->where('type',2)->select();


                    if(!empty($datas)){
                        foreach ($datas as $data){
                            $return_data[$count]['background']['name']=$data->address;
                            $return_data[$count]['background']['url'] = PREFIX.$data->address;
                        }
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
            return msg(-1,'empty type');
        if($type == 0)
            $query= ShowerMsg::where('ID',$openid)->where('type',$type)->find();
            $query ->pass = -1;
            $query->save();
            if(empty($query))
                return msg(-1,'downWall failed');

        if ($type == 1)
            $search = Matcher::where('ID',$openid)->where('type',$type)->find();
            $search->pass =-1;
            $search->save();
            if (empty($search))
                return msg(-1,'wrong');

        return msg(0,'ok');

    }

}