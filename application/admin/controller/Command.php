<?php
namespace app\admin\controller;
use app\user\model\Match;
use app\user\model\Matcher;
use app\user\model\Option;
use app\user\model\ShowerMsg;
use think\Controller;
use app\admin\model\Config;
use think\Db;
use think\facade\Cookie;
use think\facade\Request;
// 指定允许其他域名访问
header('Access-Control-Allow-Origin:*');
// 响应类型
header('Access-Control-Allow-Methods:*');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with,content-type');
class Command extends Controller{

    public function getConfig(){
        if(!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if($jwt_data === NULL)
            return msg(-10);

        $data = Config::where('ID',1)->find();
        $isset = $data->isset;
        if($isset ==1){
            $list['tomorrow'] = $data->tomorrow;
            $list['isset']=$isset;
            return msg(0,'you have set tomorrow post',$list);
        }
        if($isset ==0){
            $list['default'] = $data->default;
            $list['isset']=$isset;
            return msg(0,'you have set default post',$list);
        }
    }

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

        $datas = Match::where('type',0)->select();
        $count =0;
        $return_data=[];
        foreach ($datas as $data){
            $oneID= $data ->ID;
            $twoID = $data ->actorID;
            $return_data[$count][1]=Matcher::where('ID',$oneID)->find();
            $return_data[$count][2]=Matcher::where('ID',$twoID)->find();
            $count++;
        }

        return msg(0,'ok',$return_data);

    }

    public function suggestion(){
        if(!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if($jwt_data === NULL)
            return msg(-10);

        $data = Option::where('status',0)->select();
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

    public function change(){
        if (!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if ($jwt_data === NULL)
            return msg(-10);

        $openid = Request::param('openid');
        if(empty($openid))
            return msg(-1,'empty openid');

        $data = ShowerMsg::where('ID',$openid)->find();

        if(empty($data))
            return msg(-1,'no such person');

        $list=[];
        if(!empty(Request::param('nickName')))
            $list['name']=Request::param('nickName');

        if(!is_numeric(Request::param('age')))
            $list['age']=Request::param('age');

        if(!empty(Request::param('place')))
            $list['location']=Request::param('place');

        if(!empty(Request::param('mail')))
            $list['email']=Request::param('mail');

        if(!empty(Request::param('school')))
            $list['school']=Request::param('school');

        if(!is_numeric(Request::param('height')))
            $list['height']=Request::param('height');

        if(!empty(Request::param('constellation')))
            $list['star']=Request::param('constellation');

        if(!empty(Request::param('sex')))
            $list['gender']=Request::param('sex');

        if(!empty(Request::param('about')))
            $list['introduction']=Request::param('about');

        if(!empty(Request::param('connect')))
            $list['connect']=Request::param('connect');

        if(!empty(Request::param('target')))
            $list['goal']=Request::param('target');

        if(!is_numeric(Request::param('like')))
            $list['like']=Request::param('like');

        if(!empty(Request::param('background')))
            $list['background']=Request::param('background');

        if(!is_numeric(Request::param('pass')))
            $list['pass']=Request::param('pass');


        $data->isUpdate(true)->save($list);
        if($data)
            return msg('0','ok');
        else
            return msg(-1,'save wrong');


    }

    public function actchange(){
        if (!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if ($jwt_data === NULL)
            return msg(-10);

        $openid = Request::param('openid');
        if(empty($openid))
            return msg(-1,'empty openid');

        $data = Matcher::where('ID',$openid)->find();

        if(empty($data))
            return msg(-1,'no such person');

        $list=[];
        if(!empty(Request::param('nickName')))
            $list['name']=Request::param('nickName');

        if(!is_numeric(Request::param('age')))
            $list['age']=Request::param('age');

        if(!empty(Request::param('place')))
            $list['location']=Request::param('place');

        if(!empty(Request::param('mail')))
            $list['email']=Request::param('mail');

        if(!empty(Request::param('school')))
            $list['school']=Request::param('school');

        if(!is_numeric(Request::param('height')))
            $list['height']=Request::param('height');

        if(!empty(Request::param('constellation')))
            $list['star']=Request::param('constellation');

        if(!empty(Request::param('sex')))
            $list['gender']=Request::param('sex');

        if(!empty(Request::param('about')))
            $list['introduction']=Request::param('about');

        if(!empty(Request::param('connect')))
            $list['connect']=Request::param('connect');

        if(!empty(Request::param('target')))
            $list['goal']=Request::param('target');

        if(!is_numeric(Request::param('like')))
            $list['like']=Request::param('like');

        if(!empty(Request::param('background')))
            $list['background']=Request::param('background');

        if(!is_numeric(Request::param('pass')))
            $list['pass']=Request::param('pass');


        $data->isUpdate(true)->save($list);
        if($data)
            return msg('0','ok');
        else
            return msg(-1,'save wrong');


    }
    public function newact(){

        if (!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if ($jwt_data === NULL)
            return msg(-10);

        Db::table('matcher')->where('type', 1)->update(['type' => -1]);
        Db::table('picture')->where('type',1)->update(['type' => -1]);

        return msg(0,'ok');


    }
    public function collect(){

        if (!Cookie::has('jwt_admin'))
            return msg(-10);
        $jwt_data = jwt_decode_admin(Cookie::get('jwt_admin'));
        if ($jwt_data === NULL)
            return msg(-10);



        $list['height']['150-160']=ShowerMsg::where('height','between',[150,160])->count();
        $list['height']['160-170']=ShowerMsg::where('height','between',[160,170])->count();
        $list['height']['170-180']=ShowerMsg::where('height','between',[170,180])->count();
        $list['height']['180-190']=ShowerMsg::where('height','between',[180,190])->count();
        $list['height']['190']=ShowerMsg::where('height','>',190)->count();
        $list['height']['150']=ShowerMsg::where('height','<',150)->count();




        $list['age']['18']=ShowerMsg::where('age',18)->count();
        $list['age']['19']=ShowerMsg::where('age',19)->count();
        $list['age']['20']=ShowerMsg::where('age',20)->count();
        $list['age']['21']=ShowerMsg::where('age',21)->count();
        $list['age']['22']=ShowerMsg::where('age',22)->count();
        $list['age']['23']=ShowerMsg::where('age',23)->count();
        $list['age']['24']=ShowerMsg::where('age',24)->count();
        $list['age']['25']=ShowerMsg::where('age',25)->count();
        $list['age']['26']=ShowerMsg::where('age',26)->count();
        $list['age']['27']=ShowerMsg::where('age',27)->count();

        $list['background']['专'] = ShowerMsg::where('background','专')->count();
        $list['background']['本'] = ShowerMsg::where('background','本')->count();
        $list['background']['硕'] = ShowerMsg::where('background','硕')->count();
        $list['background']['博'] = ShowerMsg::where('background','博')->count();

        $datas = ShowerMsg::field('school,count(*) as count')->group('school')->order('count desc')->select();
        foreach ($datas as $data){
            $schoolname = $data->school;
            $list['school'][$schoolname] = $data->count;
        }
        $searchs =ShowerMsg::field('gender,count(*) as count')->group('gender')->select();
        foreach ($searchs as $search){
            $list['gender'][$search->gender] = $search->count;
        }

        return msg(-1,'ok',$list);





    }
    public function test1(){

        $searchs =ShowerMsg::field('gender,count(*) as count')->group('gender')->select();
        foreach ($searchs as $search){
            $list['gender'][$search->gender] = $search->count;
        }
        print_r($list);

    }








}