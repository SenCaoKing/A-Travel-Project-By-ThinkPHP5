<?php
/**
 * Created by PhpStrom.
 * User: Sen
 * Date: 2018/10/26
 * Time: 21:00
 */
namespace app\admin\controller;
use think\Controller;

class Login extends Base {

    public function login() {
        if(IS_POST){

            dump(123);
        }

        return view('login');
    }
}
