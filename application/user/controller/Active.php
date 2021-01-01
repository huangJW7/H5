<?php
namespace app\user\controller;
use app\user\model\Match;
use app\user\model\Payment;
use app\user\model\Picture;
use app\admin\model\Config;
use app\user\model\ShowerMsg;
use think\Controller;
use think\facade\Request;
// 指定允许其他域名访问
header('Access-Control-Allow-Origin:*');
// 响应类型
header('Access-Control-Allow-Methods:*');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with,content-type');
class Active extends Controller{
    //展示所有互选人信息
    public function index(){
        $openid = Request::param('openid');
        $actorid = Request::param('actorid');
        if(empty($openid)){
            return msg(-1,'empty openid');
        }
        if(empty($actorid)){
            return msg(-1,'empty actorid');
        }
        $search = ShowerMsg::where('ID',$openid)->where('pass',1)->where('type',1)->find();
        $data = ShowerMsg::where('ID',$actorid)->where('pass',1)->where('type',1)->find();
        if(empty($search)){
            return msg(-1,'you cant match');
        }
        if (empty($data)){
            return msg(-1,'no such actor');
        }
        $query = Match::where('ID',$openid)->find();
        if(empty($query)){
            $data1 = new Match();
            $data1->ID = $openid;
            $data1->actorID = $actorid;
            $data1->type = 1;
            $data1->save();

            //查看另一个人是否给他点赞
            $data2 = Match::where('ID',$actorid)->where('actorID',$openid)->where('type',1)->find();
            if(!empty($data2)){
                //两人匹配成功，更新Match表，其中type = 100 表示成功匹配
                $success = new Match();
                $success->ID = $openid;
                $success->actorID = $actorid;
                $success->type = 100;
                $success->save();
                return msg(0,'ok');
            }else{
                //没有对应的人
                if($data1){
                    return msg(0,'ok');
                }else{
                    return msg(-1,'failed');
                }
            }

        }




    }
    //互选点赞，每个用户只能点赞一次，互相点赞即匹配成功
    public function like(){


    }
}