<?php
/**
 * User: Sen
 * Date: 2018/11/08
 * Time: 21:00
 */
namespace app\admin\controller;
use think\Db;
use think\Request;

/**
 * Class Auth
 * @package app\extra
 * auth权限规则
 */
class Auth{
    protected $_config = array(
        'AUTH_ON'      => true, // 认证开关
        'AUTH_TYPE'    => 1,    // 认证方式，1为实时认证；2为登陆认证
    );

    /**
     * @param $name 需要验证的规则列表，支持逗号分隔的权限规则或索引数组
     * @param $uid 认证用户的id
     * @param int $type
     * @param string $mode 如果为 'or' 表示满足任一条规则即通过验证；如果为 'and' 则表示需满足所有规则才能通过验证
     * @param string $relation
     * @return bool 通过验证返回true；失败返回false
     * 检查权限
     */
    public function check($name, $uid, $type=1, $mode='url', $relation='or'){
        if(!$this->_config['AUTH_ON'])
            return true;
        $authList = $this->getAuthList($uid, $type); // 获取用户需要验证的所有有效规则列表
         if(is_string($name)){
             $name = strtolower($name);
             if(strpos($name, ',') !== false){
                 $name = explode(',', $name);
             }else{
                 $name = array($name);
             }
         }
         $list = array(); // 保存验证通过的规则名
        if($mode == 'url'){
            $REQUEST = unserialize(strtolower(serialize($_REQUEST)));
        }
        foreach($authList as $auth){
            $query = preg_replace('/^.+\?/U', '',$auth);
            if($mode == 'url' && $query != $auth){
                parse_str($query, $param); // 解析规则中的param
                $intersect = array_intersect_assoc($REQUEST, $param);
                $auth = preg_replace('/\?.*$/U', '', $auth);
                if(in_array($auth, $name) && $intersect == $param){ // 如果节点相符且url参数满足
                    $list[] = $auth;
                }
            }else if(in_array($auth, $name)){
                $list[] = $auth;
            }
        }
        if($relation == 'or' and !empty($list)){
            return true;
        }
        $diff = array_diff($name, $list);
        if($relation == 'and' and empty($diff)){
            return true;
        }
        return false;
    }

    /**
     * @param $uid   用户ID
     * @return mixed 用户所属的用户组 array('uid'=>'用户id','group_id'=>'用户组id','title'=>'用户组名称','rules'=>'用户组拥有的规则id,多个,号隔开'),...
     */
    public function getGroups($uid){
        static $groups = [];
        if(isset($groups[$uid])) return $groups[$uid];
        $user_groups = Db::name('auth_group_access')
            ->alias('a')
            ->join([['auth_group b', 'a.group_id = b.id', 'LEFT']])
            ->where("a.uid = {$uid} and b.status = 1")
            ->field("uid, group_id, title, rules")
            ->select();
        $groups[$uid] = $user_groups ?: array();
        return $groups[$uid];
    }

    /**
     * @param $uid   用户id
     * @param $type
     * @return array 权限列表
     */
    protected function getAuthList($uid, $type){
        static $_authList = array(); // 保存用户验证通过的权限列表
        $t = implode(',', (array)$type);
        if(isset($_authList[$uid . $t])){
            return $_authList[$uid . $t];
        }
        if($this->_config['AUTH_TYPE'] == 2 && isset($_SESSION['_AUTH_LIST_' . $uid . $t])){
            return $_SESSION['_AUTH_LIST_' . $uid . $t];
        }
        // 读取用户所属用户组
        $groups = $this->getGroups($uid);
        $ids = array(); // 保存用户所属用户组设置的所有权限规则id
        foreach($groups as $g){
            $ids = array_merge($ids, explode(',', trim($g['rules'], ',')));
        }
        $ids = array_unique($ids);
        if(empty($ids)){
            $_authList[$uid . $t] = array();
            return array();
        }
        $map = ['id'=>['in', $ids], 'type'=>$type, 'status'=>1];
        $rules = Db::name('auth_rule')->where($map)->field('condition, name')->select();
        // 循环规则，判断结果
        $authList = [];
        foreach($rules as $rule){
            if(!empty($rule['condition'])){ // 根据condition进行验证
                $command = preg_replace('/\{(\w*?)\}/', '$user[\'\\1\']', $rule['condition']);
                @(eval('$condition=(' . $command . ');'));
            }else{
                // 只要存在就记录
                $authList[] = strtolower($rule['name']);
            }
        }
        $_authList[$uid . $t] = $authList;
        if($this->_config['AUTH_TYPE'] == 2){
            // 规则列表结果保存到session
            $_SESSION['_AUTH_LIST_' . $uid . $t] = $authList;
        }
        return array_unique($authList);
    }

    /**
     * 获得用户资料，根据自己的情况读取数据库
     * $where = [],$field = '*'
     */
    protected function getUserInfo($uid){
        static $user_info = array();
        if(!isset($user_info[$uid])){
            $user_info[$uid] = Db::name('admin')->where(['id' => $uid])->find();
        }
        return $user_info[$uid];
    }

    /**
     * @return \think\response\Json
     * 按钮权限检查
     */
    public function buttonAuth(){
        // 检查权限，超级管理员不做检查
        if(cookie('login') == 1){
            return _success();
        }
        $data = Request::instance()->post();
        preg_match('/^\/\w+\/\w+\/\w+/', strtolower($data['rule']), $result);
        $res = $this->check($result, cookie('login'));
        if($res){
            return _success();
        }
        return _error('你没有权限操作', -2);
    }
}