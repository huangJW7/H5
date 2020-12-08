<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Request;
use think\facade\Cookie;
use app\admin\model\Adminuser;
class Pass extends Controller{
    public function index(){
        if(!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if($jwt_data === NULL)
            return msg(-10);

    }

}