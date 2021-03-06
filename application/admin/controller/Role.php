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
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $data['rules'] = implode(',', $data['rules']);
            if($data['id']){
                $res = $this->auth_group->update($data);
            }else{
                $res = $this->auth_group->insert($data);
            }
            if($res){
                return _success();
            }
            return _error('数据库操作失败');
        }
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
        // 查询当前这一条数据
        $row = $this->auth_group->where(['id' => $this->params['id']])->find();

        return $this->fetch('add_role', [
            'menu' => $top_menu,
            'row'  => $row
        ]);
    }


    /**
     * @return mixed
     * 获取管理员列表
     */
    public function index()
    {
        $list = $this->auth_group->select();
        foreach($list as $key => $value){
            $list[$key]['group'] = $this->auth_group_access
                ->alias('a')
                ->field('b.username')
                ->join([['admin b', 'a.uid = b.id']])
                ->where(['a.group_id' => $value['id']])
                ->select();
        }
        return $this->fetch('index', [
            'list' => $list
        ]);
    }

    /**
     * @return \think\response\Json
     * 删除角色
     */
    public function del()
    {
        if(Request::instance()->isPost()){
            $id = Request::instance()->post('id');
            // 角色是否有管理员
            $group = $this->auth_group_access->where(['group_id' => $id])->find();
            if($group){
                return _error('请先删除该角色的管理员');
            }
            $res = $this->auth_group->where(['id'=> $id])->delete();
            if($res){
                return _success();
            }
            return _error('操作失败');
        }
    }
}