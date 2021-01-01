<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Request;
use think\facade\Cookie;
use app\admin\model\Adminuser;

class Admin extends Controller{
    public function create(){
        $password =Request::param('password');
        $username ='super';
        $admin = new Adminuser();
        $admin -> ID =1;
        $admin ->username = $username;
        $admin ->password = Adminuser::pwd($username,$password);
        $data = $admin ->password;
        $admin ->save();
        return msg (0,'ok',$data);

    }
    public function add(){
        if(!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if($jwt_data === NULL)
            return msg(-10);

        if( empty(Request::param('username')) )
            return msg(-1,"username empty");
        if( empty(Request::param('password')) )
            return msg(-1,"password empty");
        if(strlen(Request::param('password')) < 6)
            return msg(-1,"password too short");

        //防止重复添加
        $user = Adminuser::where('username',Request::param('username'))->find();
        if(!empty($user)) return msg(-80);
        if($user->ID!=1){
            return msg(-1,'you dont have this permission');
        }

        //TODO: 对密码进行校验，不能带非法字符

        $newadminusers = new Adminuser;
        $newadminusers->username = Request::param('username');
        $newadminusers->password = Adminuser::pwd(Request::param('username'),Request::param('password'));
        $newadminusers->save();

        return msg();
    }

    public function del()
    {
        if (!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if ($jwt_data === NULL)
            return msg(-10);

        if (empty(Request::param('ID')))
            return msg(-1, "ID empty");
        if (Request::param('ID') === $jwt_data['ID'])
            return msg(-1, "can't delete yourself");
        $data = Adminuser::where('ID', Request::param('ID'))->find();
        if (empty($data))
            return msg(-60);
        if($data->ID!=1){
            return msg(-1,'you dont have this permission');
        }

        $data->delete();

        return msg();
    }
    public function listAll()
    {
        if(!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if($jwt_data === NULL)
            return msg(-10);
        $data=[];
        $userdata = Adminuser::all();
        foreach($userdata as $key => $user)
        {
            $data[$key]['ID'] = $user->ID;
            $data[$key]['username'] = $user->username;
        }

        return msg(0,"ok",$data);
    }
}
