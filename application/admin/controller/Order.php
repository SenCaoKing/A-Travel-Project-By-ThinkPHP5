<?php
namespace app\admin\controller;

use think\Controller;

class Order extends Controller
{
    public function orderlist()
    {
        dump(123);
        return view('orderlist');
    }
}
