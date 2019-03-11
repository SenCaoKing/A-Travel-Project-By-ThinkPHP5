<?php
/**
 * Created by PhpStorm.
 * User: Sen
 * Date: 2019/02/28
 * Time: 10:00
 */
namespace app\admin\validate;
use think\Validate;
class Theme extends Validate{
    // 定义规则
    protected $rule = [
        'title' => 'require',
        'content' => 'require',
        'username' => 'require',
    ];
    // 定义错误消息
    protected $message = [
        'title.require' => '标题不能为空',
        'content.require'  => '内容不能为空',
        'username.require'  => '发帖人不能为空',
    ];
    // 验证场景
    protected $scene = [
        'add'  => ['title', 'content', 'username'],
        'save' => ['title', 'content', 'username'],
    ];

}