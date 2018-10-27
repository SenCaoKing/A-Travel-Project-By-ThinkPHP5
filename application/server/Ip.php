<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Sen <2814073941@qq.com>
// +----------------------------------------------------------------------
namespace app\server;
class Ip{
    private static $ip = null;

    /**
     * @return array|false|null|string
     * 获取客户端IP
     */
    public static function get_client_ip(){
        if(self::$ip == null){
            if(isset($_SERVER)){
                if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                }elseif(isset($_SERVER['HTTP_CLIENT_IP'])){
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                }else{
                    $ip = $_SERVER['REMOTE_ADDR'];
                }
            }else{
                // 不允许就使用getenv获取
                if(getenv("HTTP_X_FORWARDED_FOR")){
                    $ip = getenv("HTTP_X_FORWARDED_FOR");
                }elseif(getenv("HTTP_CLIENT_IP")){
                    $ip = getenv("HTTP_CLIENT_IP");
                }else{
                    $ip = getenv("REMOTE_ADDR");
                }
            }
            self::$ip = $ip;
        }
        return self::$ip;
    }
}