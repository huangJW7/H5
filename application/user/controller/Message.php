<?php
namespace app\user\controller;

use app\admin\model\Config;
use app\user\model\Likes;
use app\user\model\ShowerMsg;
use think\Controller;
use think\facade\Request;



class Message extends Controller{
    public function index()
    {
        return msg();
    }

    /*
     * 返回今日展示信息
     */
    public function shower(){
        //获取openid

        $ID = Request::param('id');

        $config = Config::limit(1)->find();
        $isset = $config->isset;
        $history = $config->history;
        $default = $config->default;
        $tomorrow = $config->tomorrow;
        //查找是否设置了今日展示
        $query =ShowerMsg::where('history',$history)->find();
        //没有设置今日展示，设置
        //$datas 是需要更改history值的人
        if(empty($query)){
            echo 'empty query';
            //默认设置或明日设置
            if($isset == 0){
                //从default获取人数
                echo 'isset = 0';
                $datas = ShowerMsg::where('pass',1)->limit($default)->select();
            }
            if($isset == 1){
                echo 'isset = 1';
                $datas = ShowerMsg::field('ID,history')->where('pass',1)->limit($tomorrow)->select();
            }
            //取要更改history的ID
            foreach ($datas as $data){
                foreach ($data as $key => $value)
                {
                    if ($key == 'ID')
                        $user = ShowerMsg::where('ID', $value)->find();
                    $user->history = $history;
                    $user->save();
                    if ($user == false) {
                        return msg(-1, 'set fail');
                    }
                }
            }

            //设置了今日展示
            if(!empty($query)){
                echo 'not empty query';
                if($isset==0){
                    $query1 = ShowerMsg::where('history',$history)->where('pass',1);
                    $datas = ShowerMsg::getOpenData($query1)->select();
                    return msg(1,'ok',$datas);
                }
                if($isset ==1){
                    $query1 = ShowerMsg::where('history',$history)->where('pass',1);
                    $datas = ShowerMsg::getOpenData($query1)->select();
                    return msg(1,'ok',$datas);
                }
            }
        }

    }
    /*
     * 普通点赞操作
     * 先查询是否在表内，再判断操作是否合理
     * 将点赞信息存在like表，统计点赞数在showerMsg的like字段
     * 补充：该方法比较耗费资源，可以定期清理like表
     */
    public function like(){
        if(empty(Request::param('actorUid')))
            return msg(-1,'no actorID');

        $actorUID =Request::param('actorUid');
        $query =ShowerMsg::where('ID',$actorUID)->where('pass',1)->find();
        if(empty($data))
            return msg(-1,'no such actor');


        $data = new Likes();
        $data ->ID = Request::param('openid');
        $data ->actorID = $actorUID;
        $data->save();
        if($data===true){
            $query->like +=1;
            $query->save();
            if($query === false)
                return msg(-1,'update fail');
        }else{
            return msg(-1,'save fail');
        }
    }

    public function quit(){
        if(empty(Request::param('openid')))
            return msg(-1,'empty openid');
        if(empty(Request::param('email')))
            return msg(-1,'empty email');
        $openID = Request::param('openid');
        $email =  Request::param('email');
        $query =ShowerMsg::where('openid',$openID)->where('email',$email)->find();
        if(empty($query))
            return msg(-1,'email or openid wrong');
        /*
         * pass =1表示上墙中，0表示审核中，-1表示下墙或审核失败
         * 这里可以改变两种状态
         */
        $query ->pass = -1;
        $query->save();
        if($query===false)
            return msg(-1,'update fail');

    }

}
?>