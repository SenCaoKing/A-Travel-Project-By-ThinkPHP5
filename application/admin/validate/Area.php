<?php
/**
 * Created by PhpStorm.
 * User: Sen
 * Date: 2018/11/14
 * Time: 20:50
 */
namespace app\admin\validate;
use think\Validate;
class Area extends Validate {
    // 定义规则
    protected $rule = [
        'area' => 'require|unique:area',
    ];
    // 定义错误消息
    protected $message = [
        'area.require' => '地区名称不能为空',
        'area.unique'  => '地区名称不能重复',
    ];
    // 验证场景
    protected $scene = [
        'add'  => ['area'],
        'save' => ['area.require'],
    ];

}