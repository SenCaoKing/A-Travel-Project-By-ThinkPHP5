<?php
/**
 * Created by PhpStorm.
 * User: Sen
 * Date: 2019/02/20
 * Time: 14:00
 */
namespace app\admin\validate;
use think\Validate;
class Circle extends Validate{
    // 定义规则
    protected $rule = [
        'title' => 'require',
        'desc' => 'require',
    ];
    // 定义错误消息
    protected $message = [
        'title.require' => '圈子名称不能为空',
        'desc.require'  => '圈子描述不能为空',
    ];
    // 验证场景
    protected $scene = [
        'add'  => ['title', 'desc'],
        'save' => ['title', 'desc'],
    ];

}