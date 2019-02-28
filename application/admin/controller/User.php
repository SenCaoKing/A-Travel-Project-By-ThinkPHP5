<?php
/**
 * Created by PhpStrom.
 * User: Sen
 * Date: 2018/12/28
 * Time: 21:00
 */
namespace app\admin\controller;

class User extends Base{
    public function guideList(){
        $search = search($this->params, ['mobile'], [], ['status']);
        dump($search);
        $where = $search['where'] ?: '';
        $list = $this->guide
            ->where($where)
            ->order('uid desc')
            ->paginate(10, false, ['query' => $this->params, 'var_page' => 'page']);

        dump($list);
        return view('guideList', ['list' => $list, 'params' => $search['params']]);
    }


    public function userlist(){
        return view('userList');
    }
}
