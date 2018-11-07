<?php
/**
 * User: Sen
 * Date: 2018/11/07
 * Time: 19:00
 */
namespace app\admin\controller;
use think\Request;

/**
 * Class Role
 * @package app\admin\controller
 * 角色管理
 */
class Role extends Base {
    /**
     * @return mixed|\think\response\Json
     * 添加角色权限
     */
    public function addRole()
    {

        // 获取顶级菜单
        $top_menu = $this->auth_rule->where(['p_id' => 0])->select();
        // 查询二级
        foreach($top_menu as $key => $value){
            $top_menu[$key]['child'] = $this->auth_rule
                ->where(['p_id' => $value['id']])
                ->select();
            // 查询三级
            foreach($top_menu[$key]['child'] as $key1 => $value1){
                $top_menu[$key]['child'][$key1]['son'] = $this->auth_rule
                    ->where(['p_id' => $value1['id']])
                    ->select();
            }
        }

        dump($top_menu);
        return $this->fetch('add_role', [
            'menu' => $top_menu
        ]);
    }

    public function index(){

        return $this->fetch('index');
    }

}