<?php
namespace app\index\controller;
use think\Controller;
use think\facade\Request;
class Getcode extends Controller{
    public function geturl(){
/*        if( empty(Request::param('code')) )
            return msg(-1,"code empty");
        if( empty(Request::param('password')) )
            return msg(-1,"password empty");
        if( empty(Request::param('groups')) )
            return msg(-1,"groups empty");
        if(strlen(Request::param('password')) < 6)
            return msg(-1,"password too short");*/
//https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=REDIRECT_URI&
//response_type=code&scope=SCOPE&state=STATE#wechat_redirect
        $url ="";
        $url="https://open.weixin.qq.com/connect/oauth2/authorize?";
        $url=$url."appid=".APP_ID;
        $url=$url."&redirect_uri=".urlencode(REDIRECT_URI);
        $url=$url."&response_type=code";
        $url=$url."&scope=snsapi_base";
        $url=$url."&state=STATE#wechat_redirect";


        header("Location:$url");
        exit();

    }


}


