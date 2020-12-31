<?php
namespace app\user\model;

use think\Model;

class ShowerMsg extends Model
{
    protected $table = 'shower_msg';


    /*
     * 返回付费后的信息，在$query->field('email，QQ')里更改
     */
    public static function getPrivateData($query){

        $query->field('connect');
        return $query;

    }
    public static function getPrivateAndOpenData($query,$option=""){

        if($option =='history'){
            $query->field('ID,name,age,location,school,height,star,gender,introduction,goal,like,history,connect');
        }
        else{
            $query->field('ID,name,age,location,school,height,star,gender,introduction,goal,like,connect');
        }

        return $query;

    }
    /*
     * 返回公开数据
     */
    public static function getOpenData($query,$option=""){
        if($option =='history'){
            $query->field('ID,name,age,location,school,height,star,gender,introduction,goal,like,history');
        }
        else{
            $query->field('ID,name,age,location,school,height,star,gender,introduction,goal,like');
        }

        return $query;
    }



}
?>
