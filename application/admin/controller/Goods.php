<?php
/**
 * created by PhpStrom
 * User: Sen
 * Date: 2018/11/11
 * Time: 23:00
 */
namespace app\admin\controller;



class Goods extends Base{


    public function __construct(){
        parent::__construct();
    }

    /**
     * 公共商品列表
     * @return \think\response\View
     */
    public function goodslist()
    {
        return view('goodslist');
    }

    /**
     * 添加商品
     * @return \think\response\Json|\think\response\View
     */
    public function goodsAdd(){

        return view('goodsAdd');
    }
}
