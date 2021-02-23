<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Config;
// 应用公共文件
define("JWT_SECRET", "put your JWT secret here");
// 密码盐
define("HASH_SALT", "scgxtd");
//公众号appID
define('APP_ID','wx4d1f2c66828fd817');
//公众号appSecret
define('APP_SECRET','ea35365c0ca500ab7cf4151d5bfe3e78');
//商户号mch_id
define('MCH_ID','1604807688');
//获取openid的回调地址
define('REDIRECT_URI','http://www.scgxtd.cn/public/dist/#/');
//网址前缀
define('PREFIX','http://www.scgxtd.cn/public/public/picture/');
//用于申请预订单的url
define('POST_URL','https://api.mch.weixin.qq.com/pay/unifiedorder');
// 返回预订单信息的回调地址
define('NOTIFY_URL','http://www.scgxtd.cn/public/index/wxpay/notify');
//商户号API秘钥
define('API_SECRET','8888888866666688888888scgxtdscgx');
//付款金额，单位为分
define('FEE',1);
//error_reporting(E_ERROR | E_PARSE );
function msg($msgcode = 0, $msg = "", $data = null)
{
    $common_msg = [
        0 => "ok",
        -1 => "bad request",
        -5 => "wrong username or password",
        -10 => "didn't login",
        -20 => "option is not exist",
        -30 => "answer is too long",
        -40 => "wrong questionID",
        -50 => "bad file",
        -60 => "wrong stunum",
        -70 => "wrong record",
        -80 => "user exist",
        -85 => "user not exist",
        -90 => "exam lock",
        -95 => "exam unlock",
        -97 => "you are too early",
        -98 => "you are too late",
        -100 => "unknow error"
    ];
    if ($msg === "") {
        $msg = $common_msg[$msgcode] ? $common_msg[$msgcode] : "unknow error";
    }
    $info = ['code' => $msgcode, 'msg' => $msg];
    if ($data)
        $info['data'] = $data;
    // 加入环境
    if (Config::get('app_debug')) {
        $info['debug'] = true;
    }
    return json($info);
}

function jwt_encode_admin($ID)
{

    $user = \app\admin\model\Adminuser::where('ID', $ID)->find();
    if ($user === null)
        return null;

    $username = $user->username;
    $version = $user->version;

    $data = [
        'ID' => $ID,
        'username' => $username,
        'born' => time(),
        //FIXME: 有效期配置，这里写了Hard Code
        'expire' => time() + 7 * 24 * 3600,
        'version' => $version
    ];
    $data_64 = base64_encode(json_encode($data));
    $sign = hash_hmac('sha256', $data_64, JWT_SECRET);
    return $data_64 . $sign;
}

/**
 * @param $jwt_string
 * @return mixed|null
 * @throws \think\db\exception\DataNotFoundException
 * @throws \think\db\exception\ModelNotFoundException
 * @throws \think\exception\DbException
 */
function jwt_decode_admin($jwt_string)
{

    if (!is_string($jwt_string))
        return null;
    if (strlen($jwt_string) <= 64) {
        return null;
    }

    $sig = substr($jwt_string, -64, 64);
    $data = substr($jwt_string, 0, strlen($jwt_string) - 64);
    $data_str = base64_decode($data);
    $data_arr = json_decode($data_str, true);
    if ($data_arr === null)
        return null;

    if ($data_str === false || hash_hmac('sha256', $data, JWT_SECRET) !== $sig)
        return null;
    //FIXME: $version从数据库获取
    $user = \app\admin\model\Adminuser::where('ID', $data_arr['ID'])->find();
    if ($user === null)
        return null;

    $version = $user->version;
    if ($data_arr['expire'] < time() || $data_arr['version'] < $version)
        return null;

    return $data_arr;
}

