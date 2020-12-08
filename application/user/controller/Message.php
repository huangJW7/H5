<?php
namespace app\user\controller;

use app\user\model\ShowerMsg;
use think\Controller;
use think\Facade;
class Message extends Controller{
    public function index()
    {
        return msg();
    }


    public function shower(){
        $data = ShowerMsg::where('ID','wxopenid_123')->find();
         if(empty($data)){
             return msg(-5);
         }
         if ($data->pass == 1)
         {

         }

        return msg(0,'ok',$data);
    }
}
?>