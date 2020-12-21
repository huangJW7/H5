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

        $query->field('email,QQ');
        return $query;

    }
    
    /*
     * 返回公开数据
     */
    public static function getOpenData($query,$option=""){
        if($option =='history'){
            $query->field('name,age,location,school,height,star,gender,introduction,goal,like,history');
        }
        else{
            $query->field('name,age,location,school,height,star,gender,introduction,goal,like');
        }

        return $query;
    }



}
?>
