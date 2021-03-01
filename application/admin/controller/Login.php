<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Request;
use think\facade\Cookie;
use app\admin\model\Adminuser;
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

        $user = Adminuser::where('username', $username)->find();
        if (empty($user) || Adminuser::pwd($username,$password) !== $user->password) {
            $return_data =hash('sha256', HASH_SALT . $password . $username);
            return msg(-5,'wrong',$return_data);
        }
        // 登录成功
        echo $user;
        $user->version = $user->version + 1;
        $ID = $user->ID;
        $user->save();
        Cookie::set('jwt_admin', jwt_encode_admin($ID));
        return msg();

    }
}
