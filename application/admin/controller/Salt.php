<?php
namespace app\admin\controller;
use think\facade\Request;
use think\Controller;

use app\admin\model\Adminuser;
class Salt extends Controller{
    /*
     * 登录前先获取盐，并用于加密
     * hash(user +hash(user+password)+secret)
     * 后端只需验证即可
     */
    public function index(){
        Adminuser::where('version',Request::param('version'));
        return 'a';
    }
}