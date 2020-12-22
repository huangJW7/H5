<?php
namespace app\user\controller;
use app\user\model\Picture;
use app\user\model\ShowerMsg;
use think\Controller;
use app\user\model\Option;
use think\facade\Request;
use think\view\driver\Think;

class Upload extends Controller{
    public function index(){
        if(empty(Request::param('openid')))
            return msg(-1,'empty openid');

        $data = new ShowerMsg();
        $data->ID = Request::param('openid');
        $data->name =Request::param('nickName');
        $data->gender = Request::param('sex');
        $data->school = Request::param('school');
        $data->age    = Request::param('age');
        $data->location = Request::param('place');
        $data->star   =Request::param('constellation');
        $data->email  =Request::param('mail');
        $data->goal   =Request::param('target');
        $data->height =Request::param('height');
        $data->introduction=Request::param('about');
        $data->like   =0;
        $data->connect =Request::param('connect');//联系方式
        //上传图片
        $data->save();
        if($data===false)
            return msg(-1,'save error');

    }
    public function picture(){
        if(empty(Request::param('id')))
            return msg(-1,'empty id');
        if(empty(Request::param('type')))
            return msg(-1,'empty type');

        $ID =Request::param('id');
        $query = ShowerMsg::where('id',$ID)->find();
        if(empty($query))
            return msg(-1,'no such actor');

        $file = request()->file('image');
        $info = $file->validate(['size'=>20*1024*1024,'ext'=>'jpg,png'])->rule('uniqid')->move('picture');
        if($info){
            // 成功上传后 获取上传信息
            $data = new Picture();
            $data ->ID =$ID;
            $data ->address = $info->getSaveName();
            $data ->type = Request::param('type');
            $data->save();
            if($data !== false){
                return msg (0,'ok');
            }else{
                print_r($data);
                return msg (-1,'save picture data fail');
            }
            // 输出 jpg

        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }
}