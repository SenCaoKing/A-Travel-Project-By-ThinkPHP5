<?php
/**
 * Created by PhpStrom.
 * User: Sen
 * Date: 2018/11/06
 * Time: 21:00
 */
namespace app\admin\controller;
use app\server\Ip;
use think\Controller;
use app\server\Param;

class Login extends Base {
    protected $params;
    protected $_rule_check = false;
    protected $_is_login = false;
    /**
     * 后台登录
     * @return array|\think\response\View
     */
    public function login() {
        if(IS_POST){
            try{
                // 登录场景验证
                $validate = $this->validate($this->params, 'Admin.login');
                if(true !== $validate){
                    throw new \LogicException($validate, 1000);
                }

                $info = $this->admin
                    ->field('id, password, status')
                    ->where(['username' => $this->params['username']])
                    ->find();
                /*
                if(!$info){ // 验证用户
                    throw new \LogicException('用户名不存在', 1000);
                }
                if($info['status'] == Param::STATUS_OFF){ // 验证用户状态
                    throw new \LogicException('该用户已锁定，请联系管理员解锁', 1000);
                }
                $bool = password_verify($this->params['password'], $info['password']);
                if(!$bool){ // 验证密码
                    throw new \LogicException('用户名或密码错误', 1000);
                }
                */
                self::afterLogin($info); // 登陆后置操作
            } catch(\Exception $e){
                return _error($e->getMessage(), $e->getCode());
            }
            return _success();
        }
        return view('login');
    }

    /**
     * 退出登陆
     */
    public function logout(){
        cookie('login', null);
        self::redirect('login/login');
    }

    /**
     * 登录后置操作
     * @param $info
     */
    protected function afterLogin($info){
        // 更新用户登陆信息
        $save['id'] = $info['id'];
        $save['last_login_time'] = time();
        $save['last_login_ip'] = Ip::get_client_ip();
        $this->admin->update($save);
        cookie('login', null); // 记录cookie
        empty($this->params['remember']) ? cookie('login', $info['id'], 3600) : cookie('login', $info['id'], 3600 * 24 * 7);
    }
}