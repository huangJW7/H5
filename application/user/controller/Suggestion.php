<?php
namespace app\user\controller;
use think\Controller;
use app\user\model\Option;
use think\facade\Request;

// 指定允许其他域名访问
header('Access-Control-Allow-Origin:*');
// 响应类型
header('Access-Control-Allow-Methods:*');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with,content-type');
/*
 * 接收投诉建议
 */
class Suggestion extends Controller{
    public function index(){
        $option =new Option();
        if(empty(Request::param('question')))
            return msg(-1,'no question content');

        if(empty(Request::param('connect')))
            return msg(-1,'no contact way');

        $option->content = Request::param('question');
        $option->contact = Request::param('connect');
        $option->insert();
        if($option)
            return msg(0,'ok');
        else
            return msg(-1,'fail');

    }
}
