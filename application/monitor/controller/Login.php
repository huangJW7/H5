<?php
namespace app\monitor\model;
use think\Controller;
use think\facade\Request;

// 指定允许其他域名访问
header('Access-Control-Allow-Origin:*');
// 响应类型
header('Access-Control-Allow-Methods:*');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with,content-type');
class Login extends Controller{
    public function index()
    {
        if (empty(Request::param('username')))
            return msg(-1, "username empty");
        if (empty(Request::param('password')))
            return msg(-1, "password empty");
        $username = Request::param('username');
        $password = Request::param('password');
        if($username =='root' &&$password=='123456'){
            return msg();
        }else{
            return msg(-1,'password or username wrong');
        }
        //判断逻辑


    }
}
