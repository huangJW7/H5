<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Request;
use think\facade\Cookie;
use app\admin\model\Adminuser;

class Login extends Controller{
    public function index()
    {
        if (empty(Request::param('username')))
            return msg(-1, "username empty");
        if (empty(Request::param('password')))
            return msg(-1, "password empty");
        $username = Request::param('username');
        $password = Request::param('password');

        $user = Adminuser::where('username', $username)->find();
        if (empty($user) || Adminuser::pwd($username,$password) !== $user->password) {
            return msg(-5);
        }
        // 登录成功
        $user->version = $user->version + 1;
        $user->save();
        Cookie::set('jwt_admin', jwt_encode_admin($user->ID));
        return msg();

    }
}
