<?php
namespace app\admin\model;
use think\Model;
class Adminuser extends Model{
    public static function pwd($username, $password)
    {
        return hash('sha256', HASH_SALT . $password . $username);
    }

}