<?php
namespace app\user\controller;

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
        $data = ShowerMsg::where('ID','wxopenid_123')->find();
         if(empty($data)){
             return msg(-5);
         }
         if ($data->pass == 1)
         {

         }

        return msg(0,'ok',$data);
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