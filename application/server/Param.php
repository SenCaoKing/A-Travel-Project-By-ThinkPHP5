<?php
/**
 * Created by PhpStrom.
 * User: Sen
 * Date: 2018/10/26
 * Time: 21:00
 */
namespace app\server;

class Param{

    // 角色
    const GROUP_ADMIN = 1;        // 超级管理员

    // 状态
    const STATUS_ON = 1;          // 启用
    const STATUS_OFF = 0;         // 禁用

    // 商品类型
    const PRODUCT_GUIDE  = 1; // 导游商品
    const PRODUCT_PUBLIC = 2; // 公共商品

    // 商品审核状态
    const GOODS_AUDIT_WAITING = 1; // 待审核
    const GOODS_AUDIT_PASS    = 2; // 已通过
    const GOODS_AUDIT_NOPASS  = 3; // 未通过
}