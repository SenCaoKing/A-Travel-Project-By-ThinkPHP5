<?php
namespace app\admin\controller;

use think\Controller;

class User extends Controller
{
    public function userlist()
    {
        dump(123);
        return view('userlist');
    }
}
