<?php
namespace app\user\controller;

use app\admin\model\Config;
use app\user\model\Likes;
use app\user\model\Payment;
use app\user\model\Picture;
use app\user\model\ShowerMsg;
use think\Controller;
use think\facade\Request;
use think\Db;
// 指定允许其他域名访问
header('Access-Control-Allow-Origin:*');
// 响应类型
header('Access-Control-Allow-Methods:*');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with,content-type');

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

        $openid = Request::param('openid');
        if(empty($openid)){
            return  msg(-1,'empty openid');
        }

        $config = Config::limit(1)->find();
        $isset = $config->isset;//0为从default获取人数，1为从tomorrow获取人数
        $history = $config->history;
        $default = $config->default;
        $tomorrow = $config->tomorrow;

        //查找是否设置了今日展示
        $ispost = $config->ispost;

        //查询通过审核且未展示的人数
        $number = Db::table('shower_msg')->where('pass', 1)->where('history', null)->where('type',0)->count();

        //没有设置今日展示，设置

        //$datas是需要更改history值的人
        //判断是否设置过今日的展示信息
        //未设置情况如下
        if ($ispost==0) {
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
                //从tomorrow获取人数
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
            //设置完今日展示后，更新history,使其＋1,下次从此处开始算日期
            //在config表中添加标记ispost = 1
            $list['ispost']=1;
            $list['history']=$history+1;
            $list['ID']=1;
            $config->save($list,['ID'=>$list['ID']]);

        }

        //若$ispost==1，说明已经设置过，直接展示
        if($ispost==1){
            //$query1 = ShowerMsg::where('history',$history)->where('pass',1)->where('type',0);
            //待添加逻辑，付费信息
            //$datas = ShowerMsg::getOpenData($query1)->select();
            //获取通过审核，期数为今日期数，类型为普通上墙的ID数组
            $IDs =  ShowerMsg::where('history',$history)->where('pass',1)->where('type',0)->column('ID');

            $count = 0;
            $return_data=[];
            foreach ($IDs as $ID) {
                $data = Payment::where('actor', $ID)->where('openid',$openid)->where('ispay', 1)->find();
                if ($data != null) {
                    $res = ShowerMsg::where('ID', $ID);
                    $return_data[$count] = ShowerMsg::getPrivateAndOpenData($res)->find();
                    $return_data[$count]['image'] = Picture::field('address')->where('ID', $ID)->where('type', 0)->select();
                    foreach ($return_data[$count]['image'] as $key => $vaule) {
                        //vaule ="{\"address\":\"202012，22\\/07316443315b68108d9f7d1299f88777.png\"}
                        $vaule = json_decode($vaule, true);
                        $return_data[$count]['image'][$key] = PREFIX . $vaule['address'];
                    }
                } else {
                    $res = ShowerMsg::where('ID', $ID);
                    $return_data[$count] = ShowerMsg::getOpenData($res)->find();

                    $return_data[$count]['image'] = Picture::field('address')->where('ID', $ID)->where('type', 0)->select();
                    foreach ($return_data[$count]['image'] as $key => $vaule) {
                        //vaule ="{\"address\":\"20201222\\/07316443315b68108d9f7d1299f88777.png\"}
                        $vaule = json_decode($vaule, true);
                        $return_data[$count]['image'][$key] = PREFIX . $vaule['address'];
                    }
                }
                $count++;
            }
            return msg(0,'ok',$return_data);
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
            $data[$count1]['image'] = Picture::field('address')->where('ID', $ID['ID'])->where('type',0)->select();
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
     * 补充：该方法比较耗费资源，可以定期清理like表,或者变为伪点赞
     */
    public function like(){
        if(empty(Request::param('actorUid')))
            return msg(-1,'no actorID');

        $actorUID =Request::param('actorUid');
        $query =ShowerMsg::where('ID',$actorUID)->where('type',0)->find();
        if(empty($query))
            return msg(-1,'no such actor');
        $query->like +=1;
        $query->save();
        if($query === false)
            return msg(-1,'update fail');
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