<?php
/**
 * User: Sen
 * Date: 2018/10/26
 * Time: 22:00
 */
namespace app\admin\controller;

class Admin extends Base {
    public function index()
    {
        return $this->fetch('index');
    }

    public function adminAdd(){

        return $this->fetch('admin_add');
    }
}
