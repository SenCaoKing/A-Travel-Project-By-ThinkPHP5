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
        return $this->fetch('index');
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
                dump($data);

                $data['last_login_time'] = time();
                $data['last_login_ip']   = \app\server\Ip::get_client_ip();
                $data['create_time']     = time();
                $data['update_time']     = time();
                $data['password']        = password_hash($data['password'], true);
                if(empty($data['password'])){
                    unset($data['password']);
                    unset($data['password2']);
                }
                $this->admin->startTrans();
                if($data['id']){
                    $this->admin->update($data);

                }else{
                    $uid = $this->admin->insertGetId($data);

                }
            }catch(\Exception $e){
                $this->admin->rollback();
                return _error($e->getMessage());
            }
            $this->admin->commit();
            return _success();
        }

        return $this->fetch('admin_add');
    }
}
