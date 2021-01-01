<?php
namespace app\user\controller;
use app\user\model\Picture;
use app\user\model\ShowerMsg;
use think\Controller;
use app\user\model\Option;
use think\facade\Request;
use think\view\driver\Think;
// 指定允许其他域名访问
header('Access-Control-Allow-Origin:*');
// 响应类型
header('Access-Control-Allow-Methods:*');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with,content-type');
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
        $type = Request::param('type');
        if(!isset($type))
            return msg(-1,'empty type');

        $ID =Request::param('id');
        $query = ShowerMsg::where('id',$ID)->find();
        if(empty($query))
            return msg(-1,'no such actor');

        $file = request()->file('image');
        $info = $file->validate(['size'=>20*1024*1024,'ext'=>'jpg,png'])->rule('date')->move('public/picture');
        if($info){
            // 成功上传后 获取上传信息
            $data = new Picture();
            $data ->ID =$ID;
            $data ->address = $info->getSaveName();
            $data ->type = Request::param('type');
            $data->save();
            if($data !== false){
                $url ='www.scgxtd.cn/public/public/picture/'.$info->getSaveName();
                return msg (0,'ok',$url);
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