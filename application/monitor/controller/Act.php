<?php
namespace app\monitor\controller;
use app\monitor\model\Monitor_config;
use app\monitor\model\Monitor;
use think\Controller;
use think\facade\Request;
use app\monitor\model;
// 指定允许其他域名访问
header('Access-Control-Allow-Origin:*');
// 响应类型
header('Access-Control-Allow-Methods:*');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with,content-type');
header('Access-Control-Request-Method:GET,POST');
class Act extends Controller{
    public function login()
    {
        if (empty(Request::param('username')))
            return msg(-1, "username empty");
        if (empty(Request::param('password')))
            return msg(-1, "password empty");
        $username = Request::param('username');
        $password = Request::param('password');
        if($username =='root' &&$password=='123456'){
            return msg(0,'ok');
        }else{
            return msg(-1,'password or username wrong');
        }
        //判断逻辑

    }
    public function wx(){
        $type =Request::param('wx');
        if (!isset($type)){
            return msg (-1,'empty');
        }
        if ($type!=1 || $type!=0){
            return msg(-1,'wrong number');
        }

        $config = Monitor_config::where('ID',1)->find();
        if($config->wx == $type){
            return msg();
        }else{
            $config->wx = $type;
            $config->save();
            return msg();
        }

    }
    public function note(){
        $type =Request::param('note');
        if (!isset($type)){
            return msg (-1,'empty');
        }
        if ($type!=1 || $type!=0){
            return msg(-1,'wrong number');
        }

        $config = Monitor_config::where('ID',1)->find();
        if($config->note == $type){
            return msg();
        }else{
            $config->note = $type;
            $config->save();
            return msg();
        }


    }

    public function notify(){
        $id = Request::param('id');
        $title = Request::param('title');
        $text = Request::param('text');
        $file = request()->file('picture');

        $data = new Monitor;
        $data->camera = $id;
        $data->title = $title;
        $data->text = $text;

        if(isset($file)){
            $info = $file->validate(['size'=>20*1024*1024,'ext'=>'jpg,png,jpeg,bmp'])->rule('date')->move('public/monitor');
            if($info) {
                $data->picture = 'www.scgxtd.cn/public/monitor' . $info->getSaveName();
                $data->save();
            }
        }else{
            $data->save();
        }
        $config = Monitor_config::where('ID',1)->find();
        if ($config->wx == 1){
            $this->sendWXAlert($title);
        }
        if ($config->note == 1){
            $this->sendNoteAlert($title);
        }
        
        return msg(0,'ok');



    }
    public function sendWXAlert($text,$desp=""){
        $url="http://wx.xtuis.cn/iVztTG0Vovk9NRrnuQvu1sJrx.send";
        $params=array('text'=>$text,'desp'=>'www.baidu.com');
        $result=$this->do_get($url,$params);

    }
    function do_get($url, $params) {

        $url = "{$url}?" . http_build_query ( $params );

        $ch = curl_init ();

        curl_setopt ( $ch, CURLOPT_URL, $url );

        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );

        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );

        curl_setopt ( $ch, CURLOPT_TIMEOUT, 60 );

        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $params );

        $result = curl_exec ( $ch );

        curl_close ( $ch );

        return $result;

    }
    public function sendNoteAlert($text){

        $url="http://mail.xtuis.cn/iVztTG0Vovk9NRrnuQvu1sJrx.send";
        $params=array('text'=>$text,'desp'=>'www.baidu.com');
        $result=$this->do_get($url,$params);

    }

    public function getall(){
        $datas = Monitor::select();
        return msg(0,'ok',$datas);

    }

    public function deal(){
        $id = Request::param('id');
        $query =Monitor::where('ID',$id)->find();
        $query ->deal = 1;
        $query->save();
        return msg(0,'ok');
    }



}