<?php
namespace app\admin\controller;

use think\Controller;

class Message extends Controller
{
    public function messagelist()
    {
        dump(123);
        return view('messagelist');
    }
}
