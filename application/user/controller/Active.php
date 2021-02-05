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
    //互选点赞
    //type =1 表示正在进行的场次
    //在更新场次时，需要把所有type为1的字段删除
    //type=0 的表示成功匹配，不修改
    public function like(){
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
        $query = Match::where('ID',$openid)->where('type',1)->find();
        if(!empty($query))
            return msg(-1,'you cant do it twice');
        if(empty($query)){
            //自己没点过赞，则

            //查看另一个人是否给他点赞
            $data2 = Match::where('ID',$actorid)->where('actorID',$openid)->where('type',1)->find();
            if(!empty($data2)){
                //两人匹配成功，更新Match表，其中type = 0 表示成功匹配
                $data2 ->type =0;
                $data2->save();
                return msg(0,'ok');
            }else{
                //对方没有给你点赞
                $data1 = new Match();
                $data1->ID = $openid;
                $data1->actorID = $actorid;
                $data1->type = 1;
                $data1->save();

                if($data1){
                    //记录点赞信息并返回
                    return msg(0,'ok');
                }else{
                    //返回失败
                    return msg(-1,'failed');
                }
            }

        }




    }
    //展示信息
    public function show(){
        $id = Request::param('openid');
        if(empty($id))
            return msg(-1,'empty openid');
        //先查询是否点过赞

        $datas = ShowerMsg::where('type', 1)->where('pass', 1)->select();


    }
    public function change(){
        //删除showermsg，picture，match中type=-1的字段
        //bug待解决:若已经成功配对，则不能参与后续活动

    }
}