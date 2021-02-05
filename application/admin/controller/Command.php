<?php
namespace app\admin\controller;
use app\user\model\Match;
use app\user\model\Option;
use app\user\model\ShowerMsg;
use think\Controller;
use app\admin\model\Config;
use think\facade\Cookie;
use think\facade\Request;
// 指定允许其他域名访问
header('Access-Control-Allow-Origin:*');
// 响应类型
header('Access-Control-Allow-Methods:*');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with,content-type');
class Command extends Controller{

    public function index(){
        //Config 的isset 通过mysql的事件每日变为0

        //登录逻辑
        if(!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if($jwt_data === NULL)
            return msg(-10);

        $default =Request::param('default');
        $tomorrow = Request::param('tomorrow');
        if(!isset($default) && !isset($tomorrow))
            return msg(-1,'cant select both');

        if(isset($default) && isset($tomorrow))
            return msg (-1,'please select default or tomorrow');

        if(isset($default)) {
            $data = Config::where('ID',1)->find();
            $data->default = $default;
            $data->isset = 0;
            $data->save();
            if ($data == false) {
                return msg(-1, 'set default fail');
            }
        }
        if(isset($tomorrow)) {
            $data = Config::limit(1)->find();
            $data->tomorrow = $tomorrow;
            $data->isset = 1;
            $data->save();
            if ($data == false) {
                return msg(-1, 'set tomorrow fail');
            }
        }
        return msg (0,'ok');

    }
    public function active(){
        if(!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if($jwt_data === NULL)
            return msg(-10);

        $data = Match::where('type',1)->select();
        return msg(0,'ok',$data);

    }

    public function suggestion(){
        if(!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if($jwt_data === NULL)
            return msg(-10);

        $data = Option::select();
        return msg(0,$data);
    }
    public function downloadMatch(){
        if(!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if($jwt_data === NULL)
            return msg(-10);

        $Model = new Model();//或者 $Model = D(); 或者 $Model = M();
        $sql = "select * from `order`";
        $voList = $Model->query($sql);
        $download =  new \think\response\Download('image.jpg');
    }
/*待完成*/
    public function changeinfo(){
        if(!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if($jwt_data === NULL)
            return msg(-10);

        $openid = Request::param('openid');
        if(empty($openid))
            return msg(-1,'empty openid');

        $data = ShowerMsg::where('ID',$openid)->find();
        if(empty($data))
            return msg(-1,'no such person');

        $age = Request::param('age');
        $location = Request::param('location');
        $school = Request::param('school');
        $email = Request::param('email');
        $height = Request::param('height');
        $star = Request::param('star');
        $gender = Request::param('gender');
        $introduction = Request::param('introduction');
        $connect = Request::param('connect');
        $goal = Request::param('goal');
        $like = Request::param('like');
        $background =Request::param('background');



    }








}