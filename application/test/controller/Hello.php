<?php
namespace app\test\controller;
use app\test\model\Config;
use think\Controller;
use think\model\concern\SoftDelete;

class Hello extends Controller{

    public function showtest(){
        $default = null;
        $data = Config::limit(1)->find();
        if(empty($data))
            return msg(-1,'empty data');
        //以下代码取消注释并commit
        $data->isset =1;
        $data->save();
        return msg(0,'change success',$data);
        //return msg(0,'ok',$data);
    }
}