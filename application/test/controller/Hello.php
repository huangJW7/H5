<?php
namespace app\test\controller;
use think\Controller;

class Hello extends Controller{
    public function eat(){
        $name = 'test23';
        return 'first'.$name;

    }
}