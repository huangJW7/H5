<?php
namespace app\test\controller;
use app\test\model\Config;
use think\Controller;

class Hello extends Controller{
    public function addfile(){
        $data = new Config();
        $data ->default = 4;
        $data ->tomorrow = 1;
        $data ->isset = 1;
        print_r($data);

        $data ->save();
        if($data ===true)
            echo "add ok";

    }
    public function showtest(){
        $default;
        $data = Config::where('default',$default)->where('tomorrow',2)->fetchSql(true)->find();


    }
}