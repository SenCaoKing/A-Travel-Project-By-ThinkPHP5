<?php
/**
 * User: Sen
 * Date: 2018/10/24
 * Time: 20:00
 */
namespace app\admin\controller;
use think\Request;

/**
 * Class Rule
 * @package app\admin\controller
 * 权限节点管理
 */
class Rule extends Base {

    public function addRule()
    {
        // 读取一级菜单
        $top_menu = $this->auth_rule->where('p_id = 0')->field('id, title, p_id')->select();
        $id = intval(input('param.id'));
        $menu = $this->auth_rule->where(['id' => $id])->find();
        foreach($top_menu as $k => $v){
            $top_menu[$k]['child'] = $this->auth_rule->where("p_id = {$v['id']}")->field('id, title, p_id')->select();
        }
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $data['name'] = strtolower($data['name']);
            if($data['id']){
                $res = $this->auth_rule->update($data);
            }else{
                $res = $this->auth_rule->insert($data);
            }
            if(false !== $res){
                return _success();
            }
            return _error('操作失败');
        }
        return $this->fetch('add_rule', [
            'top_menu' => $top_menu,
            'menu'     => $menu
        ]);
    }


    /**
     * @return mixed
     */
    public function index()
    {
        $list = $this->auth_rule->select();
        return $this->fetch('index', [
            'list' => rule_infinite($list, 0, 0)
        ]);
    }

    /**
     * @return \think\response\Json
     * 删除权限节点
     */
    public function del()
    {
        if(Request::instance()->isPost()){
            $id = Request::instance()->post('id');
            $child = $this->auth_rule->where(['p_id' => $id])->find();
            if($child){
                return _error('还有子栏目没有被删除');
            }
            $res = $this->auth_rule->where(['id' => $id])->delete();
            if($res){
                return _success();
            }
            return _error('操作失败');
        }
    }
}