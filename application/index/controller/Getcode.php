<?php
namespace app\index\controller;
use http\Params;
use think\Controller;
use think\Exception;
use think\facade\Request;
class Getcode extends Controller{
     public function geturl(){
    /*
     * 该接口可以得到用户访问的链接
     * 并直接跳入用户的入口界面REDIRECT_URI
     */

        $url ="";
        $url="https://open.weixin.qq.com/connect/oauth2/authorize?";
        $url=$url."appid=".APP_ID;
        $url=$url."&redirect_uri=".urlencode(REDIRECT_URI);//REDIRECT_URI是用户入口界面
        $url=$url."&response_type=code";
        $url=$url."&scope=snsapi_base";
        $url=$url."&state=STATE#wechat_redirect";

        //跳转到链接
        //https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=REDIRECT_URI&
        //response_type=code&scope=SCOPE&state=STATE#wechat_redirect
        header("Location:$url");
        exit();

    }
    public function token(){


        /*使用code得到access_token
        *并存储到数据库(未实现)
        *https://api.weixin.qq.com/sns/oauth2/access_token?appid=APPID&secret=SECRET&code=CODE
        &grant_type=authorization_code*/
        $code = Request::param('code');
        $state = Request::param('state');
        $url ="";
        $url= $url."https://api.weixin.qq.com/sns/oauth2/access_token?";
        $url= $url."appid=".APP_ID;
        $url= $url."&secret=".APP_SECRET;
        $url= $url."&code=".$code;
        $url= $url."&grant_type=authorization_code";
        $token ="";
        $token = file_get_contents($url);

        $data = json_decode($token);
        return $data[openid];


    }


}


