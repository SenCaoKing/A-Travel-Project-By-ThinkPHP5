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
     * @var bool
     * 不做权限控制 | false
     */
    protected $_rule_check = true;

    /**
     * @var bool
     * 不做权限控制 | false
     */
    protected $_is_login = true;

    /**
     * @var array
     * 参数
     */
    protected $params;

    /**
     * @var array|false|\PDOStatement|string|\think\Collection
     * 菜单组
     */
    protected $menu;

    /**
     * @var mixed
     * 登陆id
     */
    protected $id;

    public function __construct(){
        parent::__construct();
        !defined('IS_POST') && define('IS_POST', $this->request->isPost()); // 定义是否POST请求
        !defined('IS_AJAX') && define('IS_AJAX', $this->request->isAjax()); // 定义是否AJAX请求
        $this->params = Request::instance()->param();
        if(false === $this->_is_login){
            return true;
        }
        $this->id = cookie('login');
        if(empty($this->id)){
            $this->redirect('login/login');
        }
        $this->menu = $this->get_menu();
        $rule = '/'.Request::instance()->module().'/'.Request::instance()->controller().'/'.Request::instance()->action();
        $rule = strtolower($rule);
        $this->assign('button', $this->menu);
        $this->assign('rule', $rule);
        $this->assign('parent_title', $this->get_parent_title($rule));
        $this->assign('son_title', $this->get_son_title($rule));
        $auth = new Auth();
        $ret = $auth->check($rule, $this->id);
        // 权限验证
        if('index' == strtolower(Request::instance()->controller()) || 1 == $this->id || false === $this->_rule_check){
            return true;
        }
        if(!$ret){
            if(IS_AJAX){
                header('Content-Type:application/json; charset=utf-8');
                exit(json_decode([
                    'msg'  => '没有权限操作',
                    'code' => -1
                ]));
            }else{
                $this->error('没有权限操作');
            }
        }
    }

}