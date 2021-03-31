<?php
namespace app\user\controller;
use app\user\model\Match;
use app\user\model\Matcher;
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
    public function normal(){
        $ID=Request::param('openid');
        if(empty(Request::param('openid')))
            return msg(-1,'empty openid');
        $search = ShowerMsg::where('ID',Request::param('openid'))->find();
        if(!empty($search)) {
            $pass = $search->pass;
            if ($pass == -1) {
                $pictures = Picture::where('ID',$ID)->where('type=0 or type =2')->column('address');
                foreach ($pictures as $picture){
                    $filename = ROOT_PATH .$picture;
                    if(file_exists($filename)){
                        unlink($filename);
                    }
                }
                $delete = Picture::where('ID',$ID)->where('type=0 or type =2')->delete();
                $search->delete();
            }
            if($pass == 0){
                $pictures = Picture::where('ID',$ID)->where('type=0 or type =2')->column('address');
                foreach ($pictures as $picture){
                    $filename = ROOT_PATH .$picture;
                    if(file_exists($filename)){
                        unlink($filename);
                    }
                }
                $delete = Picture::where('ID',$ID)->where('type=0 or type =2')->delete();
                $search->delete();
            }
            if($pass == 1){
                return msg(-1,'系统已经存在您的信息，请联系管理员');
            }
        }

        $data = new ShowerMsg();
        $data->ID = $ID;
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
        $data->background =Request::param('background');
        $data->connect =Request::param('connect');//联系方式
        $data->type = 0;
        //上传图片
        $data->save();
        if($data===false)
            return msg(-1,'save error');
        else
            return msg(0,'ok');

    }
    public function active(){
        if(empty(Request::param('openid')))
            return msg(-1,'empty openid');
        $ID = Request::param('openid');
        $search = Matcher::where('ID',Request::param('openid'))->find();
        if(!empty($search)) {
            $pass = $search->pass;
            if ($pass == 1) {
                return msg(-1, 'you had sign up');
            }
            if($pass ==0){
                $pictures = Picture::where('ID',$ID)->where('type=1 or type =3')->column('address');
                foreach ($pictures as $picture){
                    $filename = ROOT_PATH .$picture;
                    if(file_exists($filename)){
                        unlink($filename);
                    }
                }
                $delete = Picture::where('ID',$ID)->where('type=1 or type =3')->delete();
                $search->delete();
            }
            if($pass == -1){
                $pictures = Picture::where('ID',$ID)->where('type=1 or type =3')->column('address');
                foreach ($pictures as $picture){
                    $filename = ROOT_PATH .$picture;
                    if(file_exists($filename)){
                        unlink($filename);
                    }
                }
                $delete = Picture::where('ID',$ID)->where('type=1 or type =3')->delete();
                $search->delete();
            }
        }
        $data = new Matcher();
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
        $data->background =Request::param('background');
        $data->connect =Request::param('connect');//联系方式
        $data->type = 1;

        $data->save();
        if($data===false)
            return msg(-1,'save error');
        else
            return msg(0,'ok');

    }






    public function picture(){
        //上墙图片接口
        if(empty(Request::param('id')))
            return msg(-1,'empty id');
        //type用来区分学信网照片和普通上墙照片
        //type = 0表示普通上墙 2表示学信网
        $type = Request::param('type');

        if(!is_numeric($type))
            return msg(-1,'wrong type');

        $ID =Request::param('id');

        $query = ShowerMsg::where('id',$ID)->find();
        if(empty($query))
            return msg(-1,'no such actor');

        $file = request()->file('file');
        $info = $file->validate(['size'=>20*1024*1024,'ext'=>'jpg,png'])->rule('date')->move('public/picture');
        if($info){
            // 成功上传后 获取上传信息
            $data = new Picture();
            $data ->ID =$ID;
            $data ->address = $info->getSaveName();
            $data ->type = $type;
            $data->save();
            if($data !== false){
                $url ='www.scgxtd.cn/public/public/picture/'.$info->getSaveName();
                return msg (0,'ok');
            }else{

                return msg (-1,'save picture data fail');
            }
            // 输出 jpg

        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }
    public function actpicture(){
        //互选图片接口
        if(empty(Request::param('id')))
            return msg(-1,'empty id');
        //type区分 1为互选 0为上墙 -1为弃用,3为互选学历
        $type = Request::param('type');

        if(!is_numeric($type))
            return msg(-1,'wrong type');

        $ID =Request::param('id');
        $query = Matcher::where('id',$ID)->find();
        if(empty($query))
            return msg(-1,'no such actor');

        $file = request()->file('file');
        $info = $file->validate(['size'=>20*1024*1024,'ext'=>'jpg,png'])->rule('date')->move('public/picture');
        if($info){
            // 成功上传后 获取上传信息
            $data = new Picture();
            $data ->ID =$ID;
            $data ->address = $info->getSaveName();
            $data ->type = $type;
            $data->save();
            if($data !== false){
                $url ='www.scgxtd.cn/public/public/picture/'.$info->getSaveName();
                return msg (0,'ok');
            }else{

                return msg (-1,'save picture data fail');
            }
            // 输出 jpg

        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }

}