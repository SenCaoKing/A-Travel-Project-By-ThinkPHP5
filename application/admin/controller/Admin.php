<?php
/**
 * User: Sen
 * Date: 2018/10/26
 * Time: 22:00
 */
namespace app\admin\controller;
use think\Request;

class Admin extends Base {
    public function index()
    {
        $list = $this->admin
            ->alias('a')
            ->join([
                ['auth_group_access b', 'a.id = b.uid', 'left'],
                ['auth_group c', 'b.group_id = c.id', 'left']
            ])
            ->field('a.id, a.status, a.username, a.create_time, c.title')
            ->where('a.id > 1')
            ->select();
        return $this->fetch('index', [
            'list' => $list
        ]);
    }

    /**
     * @return mixed|\think\response\Json
     * 添加修改管理员
     */
    public function adminAdd()
    {
        if(Request::instance()->isPost()){
            try{
                $data = Request::instance()->post();
                $data['last_login_time'] = time();
                $data['last_login_ip']   = \app\server\Ip::get_client_ip();
                $data['create_time']     = time();
                $data['update_time']     = time();
                $data['password']        = password_hash($data['password'], true);
                if(empty($data['password'])){
                    unset($data['password']);
                }
                unset($data['password2']); // 销毁password2
                $group_id = $data['group_id'];
                unset($data['group_id']); // 销毁多余字段
                $this->admin->startTrans();
                if($data['id']){
                    $this->admin->update($data);
                    $data['group_id'] = $group_id;
                    $this->auth_group_access
                        ->where(['uid' => $data['id']])
                        ->update([
                            'group_id' => $data['group_id']
                        ]);
                }else{
                    $uid = $this->admin->insertGetId($data);
                    $data['group_id'] = $group_id;
                    $this->auth_group_access->insert([
                        'uid'      => $uid,
                        'group_id' => $data['group_id']
                    ]);
                }

            }catch(\Exception $e){
                $this->admin->rollback();
                return _error($e->getMessage());
            }
            $this->admin->commit();
            return _success();
        }


        $role = $this->auth_group->select();
        $id = Request::instance()->param('id');
        $admin = $this->admin->where(['id' => $id])->find();
        return $this->fetch('admin_add', [
            'role' => $role,
            'row'  => $admin
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
            $info = $this->admin->where(['id' => $id])->find();
            if($info){
                $this->auth_group_access->where(['uid' => $id])->delete();
                $res = $this->admin->where(['id' => $id])->delete();
            }
            if($res){
                return _success();
            }
            return _error('操作失败');
        }
    }
}
