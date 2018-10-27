<?php
/**
 * User: Sen
 * Date: 2018/10/24
 * Time: 20:00
 */
namespace app\admin\controller;
use think\Request;

class Base extends Menu {


    /**
     * @var array|false|\PDOStatement|string|\think\Collection
     * 菜单组
     */
    protected $menu;

    public function __construct(){


        parent::__construct();
        dump(123);

        $this->menu = $this->get_menu();
        $rule = '/'.Request::instance()->module().'/'.Request::instance()->controller().'/'.Request::instance()->action();
        $rule = strtolower($rule);
        $this->assign('button', $this->menu);
        $this->assign('rule', $rule);
        $this->assign('parent_title', $this->get_parent_title($rule));
        $this->assign('son_title', $this->get_son_title($rule));

    }
}
