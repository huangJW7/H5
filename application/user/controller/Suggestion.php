<?php
namespace app\user\controller;
use think\Controller;
use app\user\model\Option;
use think\facade\Request;
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
        $option->save();
        return msg(0,'ok');


    }
}
