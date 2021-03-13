<?php
namespace app\user\controller;
use app\user\model\Match;
use app\user\model\Matcher;
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
        $search = Matcher::where('ID',$openid)->where('type',1)->find();

        $data = Matcher::where('ID',$actorid)->where('type',1)->find();
        if(empty($search)){
            return msg(-1,'you must sign up first');
        }
        if (empty($data)){
            return msg(-1,'no such actor');
        }
        $query = Match::where('ID',$openid)->where('type',1)->find();
        if(!empty($query))
            return msg(-1,'you cant do it twice');
        $search2 =Match::where('ID',$actorid)->where('actorID',$openid)->where('type',0)->find();
        if(!empty($search2)){
            return msg(-1,'you have made a pair successfully');
        }
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
    //展示互选信息
    public function show(){
        $openid = Request::param('openid');
        if(empty($openid))
            return msg(-1,'empty openid');

        $search = Matcher::where('ID',$openid)->find();
        if(empty($search)){
            return msg(-1,'you must sing up first');
        }


        $IDs = Matcher::where('pass',1)->where('type', 1)->column('ID');

        $count = 0;
        $return_data=[];

        foreach ($IDs as $ID) {

            $res =Matcher::where('ID', $ID);
            $return_data[$count] =Matcher::getOpenData($res)->find();

            $return_data[$count]['image'] = Picture::field('address')->where('ID', $ID)->where('type', 1)->select();
            foreach ($return_data[$count]['image'] as $key => $vaule) {
                //vaule ="{\"address\":\"20201222\\/07316443315b68108d9f7d1299f88777.png\"}
                $vaule = json_decode($vaule, true);
                $return_data[$count]['image'][$key] = PREFIX . $vaule['address'];
            }
            $count++;
        }
        return msg(0,'ok',$return_data);

    }
    public function check(){
        $openid = Request::param('openid');
        if(empty($openid))
            return msg(-1,'empty openid');

        $search = Matcher::where('ID',$openid)->find();
        if(empty($search)){
            return msg(-1,'you must sing up first');
        }else{
            return msg(0);
        }


        //删除showermsg，picture，match中type=-1的字段
        //bug待解决:若已经成功配对，则不能参与后续活动

    }
}