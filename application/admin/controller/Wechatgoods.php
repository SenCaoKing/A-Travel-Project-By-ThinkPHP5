<?php
/**
 * Created By Phpstorm.
 * User: Sen
 * Date: 2018/11/20
 * Time: 20:00
 */
namespace app\admin\controller;


use think\Request;


/**
 * Class Wechatgoods
 * @package app\admin\controller
 * 微信小程序商品添加
 */
class Wechatgoods extends Base {
    /**
     * @return mixed
     * 微信商品列表
     */
    public function index()
    {

        return $this->fetch('index');
    }


}
