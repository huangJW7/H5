<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Config;
use think\facade\Request;

class Command extends Controller{

    public function index(){
        //Config 的isset 通过mysql的事件每日变为0


        //登录逻辑

        $default =Request::param('default');
        $tomorrow = Request::param('tomorrow');
        if(!isset($default) && !isset($tomorrow))
            return msg(-1,'cant select both');

        if(isset($default) && isset($tomorrow))
            return msg (-1,'please select default or tomorrow');

        if(isset($default)) {
            $data = Config::where('ID',1)->find();
            $data->default = $default;
            $data->isset = 0;
            $data->save();
            if ($data == false) {
                return msg(-1, 'set default fail');
            }
        }
        if(isset($tomorrow)) {
            $data = Config::limit(1)->find();
            $data->tomorrow = $tomorrow;
            $data->isset = 1;
            $data->save();
            if ($data == false) {
                return msg(-1, 'set tomorrow fail');
            }
        }
        return msg (0,'ok');

    }








}