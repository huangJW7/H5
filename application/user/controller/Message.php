<?php
namespace app\user\controller;

use app\admin\model\Config;
use app\user\model\Likes;
use app\user\model\Picture;
use app\user\model\ShowerMsg;
use think\Controller;
use think\facade\Request;
use think\Db;


class Message extends Controller{
    public function index()
    {
        return msg();
    }

    /*
     * 返回今日展示信息
     */
    public function shower()
    {
        //获取openid

        $ID = Request::param('id');

        $flag =0;
        $config = Config::limit(1)->find();
        $isset = $config->isset;
        $history = $config->history;
        $default = $config->default;
        $tomorrow = $config->tomorrow;

        //查找是否设置了今日展示
        $query = ShowerMsg::where('history', $history)->find();
        //查询通过审核且未展示的人数
        $number = Db::table('shower_msg')->where('pass', 1)->where('history', null)->where('type',0)->count();

        //没有设置今日展示，设置

        //$datas 是需要更改history值的人
        if (empty($query)) {
            //默认设置或明日设置
            if ($isset == 0) {
                //从default获取人数
                if ($number >= $default) {
                    $datas = ShowerMsg::where('pass', 1)->where('history', null)->where('type',0)->limit($default)->column('ID');

                } else {
                    return msg(-1, 'not enough persons');
                }
            }

            if ($isset == 1) {

                if ($number >= $tomorrow) {
                    $datas = ShowerMsg::where('pass', 1)->where('history', null)->where('type',0)->limit($tomorrow)->column('ID');

                } else {
                    return msg(-1, 'not enough persons');
                }
            }
            //取要更改history的ID
            foreach ($datas as $key => $value) {
                $user = ShowerMsg::where('ID', $value)->find();
                if (empty($user))
                    return msg(-1, 'no found');
                $user->history = $history;
                $user->save();
                if ($user == false) {
                    return msg(-1, 'set fail');
                }
            }
            $flag =1;


        }


        //再次查询
        $again =ShowerMsg::where('history',$history)->find();

        if(!empty($again)){
            //设置了今日展示
            if($isset==0){
                $query1 = ShowerMsg::where('history',$history)->where('pass',1)->where('type',0);
                //待添加逻辑，付费信息
                $datas = ShowerMsg::getOpenData($query1)->select();
                return msg(1,'ok',$datas);
            }
            //未设置今日展示
            if($isset ==1){
                $query1 = ShowerMsg::where('history',$history)->where('pass',1)->where('type',0);
                //待添加逻辑，付费信息
                $datas = ShowerMsg::getOpenData($query1)->select();
                return msg(1,'ok',$datas);
            }
        }
    }
    public function picture(){
        $config = Config::limit(1)->find();
        $history = $config->history;
        $IDs = ShowerMsg::field('ID')->where('history',$history)->where('pass',1)->where('type',0)->select();
        $count1 = 0;
        $data=null;
        foreach ($IDs as $ID) {
            $count2 = 0;
            $data[$count1]['ID'] = $ID['ID'];
            $data[$count1]['image'] = Picture::field('address')->where('ID', $ID['ID'])->select();
            foreach ($data[$count1]['image'] as $key => $vaule){
                //vaule ="{\"address\":\"20201222\\/07316443315b68108d9f7d1299f88777.png\"}
                $vaule = json_decode($vaule,true);
                $data[$count1]['image'][$key] = PREFIX.$vaule['address'];
                $count2+=1;
            }
            $count1 += 1;
        }
        return msg(0, 'ok', $data);
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