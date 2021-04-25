<?php
namespace app\user\controller;

use app\admin\model\Config;
use app\admin\model\Posted;
use app\admin\model\Wb;
use app\user\model\Likes;
use app\user\model\Payment;
use app\user\model\Picture;
use app\user\model\ShowerMsg;
use think\Controller;
use think\facade\Request;
use think\Db;
require __DIR__.'/../../../public/libweibo-master/saetv2.ex.class.php' ;

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

        $openid = Request::param('id');
        if(empty($openid)){
            return  msg(-1,'empty openid');
        }
        $history = Db::table('shower_msg')->max('history');



        //$IDs =  ShowerMsg::where('history',$history)->where('pass',1)->where('type',0)->column('ID');
        $womenIDs = ShowerMsg::where('history',$history)->where('pass',1)->where('type',0)->where('gender','女')->column('ID');
        $menIDs =  ShowerMsg::where('history',$history)->where('pass',1)->where('type',0)->where('gender','男')->column('ID');
        $count = 0;
        $return_data=[];
        foreach ($womenIDs as $ID) {
            $data = Payment::where('actor', $ID)->where('openid',$openid)->where('ispay', 1)->find();
            if ($data != null) {
                $res = ShowerMsg::where('ID', $ID);
                $return_data[$count] = ShowerMsg::getPrivateAndOpenData($res,'history')->find();
                $return_data[$count]['ispay']=1;
                $return_data[$count]['number']= $count+1;
                $return_data[$count]['image'] = Picture::field('address')->where('ID', $ID)->where('type', 0)->select();
                foreach ($return_data[$count]['image'] as $key => $vaule) {
                    //vaule ="{\"address\":\"202012，22\\/07316443315b68108d9f7d1299f88777.png\"}
                    $vaule = json_decode($vaule, true);
                    $return_data[$count]['image'][$key] = PREFIX . $vaule['address'];
                }
            } else {
                $res = ShowerMsg::where('ID', $ID);
                $return_data[$count] = ShowerMsg::getPrivateAndOpenData($res,'history')->find();
                $return_data[$count]['ispay']=0;
                $return_data[$count]['number']= $count+1;
                $return_data[$count]['image'] = Picture::field('address')->where('ID', $ID)->where('type', 0)->select();
                foreach ($return_data[$count]['image'] as $key => $vaule) {
                    //vaule ="{\"address\":\"20201222\\/07316443315b68108d9f7d1299f88777.png\"}
                    $vaule = json_decode($vaule, true);
                    $return_data[$count]['image'][$key] = PREFIX . $vaule['address'];
                }
            }
            $count=$count+2;
        }
        $count =1;
        foreach ($menIDs as $ID) {
            $data = Payment::where('actor', $ID)->where('openid',$openid)->where('ispay', 1)->find();
            if ($data != null) {
                $res = ShowerMsg::where('ID', $ID);
                $return_data[$count] = ShowerMsg::getPrivateAndOpenData($res,'history')->find();
                $return_data[$count]['ispay']=1;
                $return_data[$count]['number']= $count+1;
                $return_data[$count]['image'] = Picture::field('address')->where('ID', $ID)->where('type', 0)->select();
                foreach ($return_data[$count]['image'] as $key => $vaule) {
                    //vaule ="{\"address\":\"202012，22\\/07316443315b68108d9f7d1299f88777.png\"}
                    $vaule = json_decode($vaule, true);
                    $return_data[$count]['image'][$key] = PREFIX . $vaule['address'];
                }
            } else {
                $res = ShowerMsg::where('ID', $ID);
                $return_data[$count] = ShowerMsg::getPrivateAndOpenData($res,'history')->find();
                $return_data[$count]['ispay']=0;
                $return_data[$count]['number']= $count+1;
                $return_data[$count]['image'] = Picture::field('address')->where('ID', $ID)->where('type', 0)->select();
                foreach ($return_data[$count]['image'] as $key => $vaule) {
                    //vaule ="{\"address\":\"20201222\\/07316443315b68108d9f7d1299f88777.png\"}
                    $vaule = json_decode($vaule, true);
                    $return_data[$count]['image'][$key] = PREFIX . $vaule['address'];
                }
            }
            $count=$count+2;
        }
        return msg(0,'no enough person, show last post',$return_data);
    }
    public function picture(){
        $config = Config::where('ID',1)->find();
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
    public function like()
    {
        if (empty(Request::param('actorUid')))
            return msg(-1, 'no actorID');

        $actorUID = Request::param('actorUid');
        $data = ShowerMsg::where('ID', $actorUID)->find();
        if (empty($data))
            return msg(-1, 'no such actor');
        $data->like += 1;
        $data->save();

        if ($data) {
            $search = Posted::where('openid', $actorUID)->find();

            if (empty($search)) {
                $config_data = Wb::where('ID', 1)->find();
                $like = $config_data->likes;
                $data = ShowerMsg::where('ID', $actorUID)->find();
                if ($data->like >= $like && is_numeric($data->history)) {
                    $text = "【" . $config_data->number . "号" . $data->gender . "神】 第" . $data->history . "期 [心]蹲评论区[心]
" . $data->name . " " . $data->height . " " . $data->gender . " " . $data->age . " " . $data->star . " " . $data->school . " " . $data->background . "
我的日常：" . $data->introduction . "http://www.scgxtd.cn/public/dist/img/qrcode.e31cac66.png";
                    $pic_address = Picture::limit(1)->where('ID', $data->ID)->where('type', 0)->column('address');
                    $content1 = 'http://www.scgxtd.cn/public/public/picture/' . $pic_address[0];
                    $o = new \SaeTClientV2('3190024882', '747c0c57d6e943ddeff70f496a2b9544', $config_data->token);
                    $post_text = urlencode($text);
                    $ret = $o->share($post_text, $content1);    //发送微博
                    if (isset($ret['error_code']) && $ret['error_code'] > 0) {
                    } else {
                        $save = new Posted();
                        $save->openid = $actorUID;
                        $save->save();
                        $config_data->number = $config_data->number + 1;
                        $config_data->save();
                    }
                }
            }
        }
    }









    public function quit(){
        if(empty(Request::param('openid')))
            return msg(-1,'empty openid');
        if(empty(Request::param('email')))
            return msg(-1,'empty email');
        $openID = Request::param('openid');
        $email =  Request::param('email');
        $query =ShowerMsg::where('ID',$openID)->where('email',$email)->find();
        if(empty($query))
            return msg(-1,'邮箱与用户不匹配');
        /*
         * pass =1表示上墙中，0表示审核中，-1表示下墙或审核失败
         * 这里可以改变两种状态
         */
        $query ->pass = -1;
        $query->save();
        if($query===false){
            return msg(-1,'下墙失败');
        }

        else{
            return msg(0,'下墙成功');

        }

    }

}
?>