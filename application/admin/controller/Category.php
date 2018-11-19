<?php
/**
 * User: Sen
 * Date: 2018/11/19
 * Time: 20:30
 */
namespace app\admin\controller;
use think\Request;

/**
 * Class Category
 * @package app\admin\controller
 * 分类管理
 */
class Category extends Base {
    public function index()
    {

        return $this->fetch('index');
    }

    /**
     * @return mixed|\think\response\Json
     * 添加修改分类
     */
    public function categoryAdd(){

        return $this->fetch('category_add');
    }
}
