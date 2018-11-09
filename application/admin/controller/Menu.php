<?php
/**
 * User: Sen
 * Date: 2018/10/24
 * Time: 20:00
 */
namespace app\admin\controller;
use think\Controller;

class Menu extends Controller {

    /**
     * @param $name
     * @return mixed|\think\db\Query
     */
    public function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->$name = \think\Db::name($name);
    }

    /**
     * @param $name
     * @param $value
     * @return $name;
     */
    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        return $this->$name = $value;
    }

    /**
     * @return array|false|\PDOStatement|string|\think\Collection
     * 获取权限列表
     */
    public function get_menu(){
        $id = cookie('login'); // 超级管理员，拥有至高无上的权利
        if($id == 1){
            $top_menu = $this->auth_rule
                ->where(['p_id' => 0, 'is_show' => 0])
                ->select();
            foreach($top_menu as $key => $value){
                $top_menu[$key]['child'] = $this->auth_rule
                    ->where(['p_id' => $value['id']])
                    ->select();
            }
        }else{
            $group_access = $this->auth_group_access
                ->alias('a')
                ->where(['uid' => $id])
                ->join([['auth_group b', 'a.group_id = b.id', 'left']])
                ->field('b.rules')
                ->find();
            // 查询权限菜单
            $top_menu = $this->auth_rule->where("id in({$group_access['rules']}) and p_id = 0")->select();
            foreach($top_menu as $key => $value){
                $top_menu[$key]['child'] = $this->auth_rule->where("id in({$group_access['rules']}) and p_id = {$value['id']}")->select();
            }
        }
        return $top_menu;
    }

    /**
     * @param $rule
     * @return mixed
     * 获取父级标题
     */
    public function get_parent_title($rule)
    {
        $this->rule = $rule;
        $parent_title = $this->auth_rule->where('id', 'IN', function($query){
            $query->table('sen_auth_rule')->where('name', $this->rule)->field('p_id');
        })->find();
        return $parent_title['title'];
    }

    /**
     * @param $rule
     * @return mixed
     * 获取子标题
     */
    public function get_son_title($rule){
        $son_title = $this->auth_rule->where(['name' => $rule])->find();
        return $son_title['title'];
    }
}