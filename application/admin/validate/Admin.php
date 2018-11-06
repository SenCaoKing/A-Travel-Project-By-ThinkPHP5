<?php
/**
 * User: Sen
 * Date: 2018/11/06
 * Time: 21:30
 */
namespace app\admin\validate;
use think\Validate;

class Admin extends Validate {
    // 定义规则
    protected $rule = [
        'username' => 'require|length:2,20|unique:admin',
        'password' => 'require|length:6,18',
        // 'captcha'  => 'require|captcha'
    ];
    // 定义错误消息
    protected $message = [
        'username.require' => '用户名不能为空',
        'username.length'  => '用户名长度为2-20位',
        'username.unique'  => '用户名已存在',
        'password.require' => '密码不能为空',
        'password.length'  => '密码长度为6-18位',
        // 'captcha.require'  => '验证码不能为空',
        // 'captcha.captcha'  => '验证码不正确',
    ];
    // 验证场景
    protected $scene = [
        'login'    => ['username.require', 'password', /* 'captcha' */],
        'adminAdd' => ['username', 'password']
    ];

}