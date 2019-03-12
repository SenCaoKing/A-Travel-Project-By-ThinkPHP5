<?php
/**
 * Created by PhpStorm.
 * User: Sen
 * Date: 2019/03/01
 * Time: 14:00
 */
namespace app\admin\validate;
use think\Validate;
class Message extends Validate{
    // 定义规则
    protected $rule = [
        'content' => 'require',
    ];
    // 定义错误消息
    protected $message = [
        'content.require'  => '内容不能为空',
    ];
    // 验证场景
    protected $scene = [
        'add'  => ['content'],
        'save' => ['content'],
    ];

}