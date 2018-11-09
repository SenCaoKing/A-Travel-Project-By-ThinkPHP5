<?php
/**
 * User: Sen
 * Date: 2018/11/09
 * Time: 20:30
 */
namespace app\admin\controller;

class Index extends Base {
    public function index(){
        $info = $this->admin
            ->where(['id'=>$this->id])
            ->find();
dump($info);
        return view('index', ['info'=>$info]);
    }
}