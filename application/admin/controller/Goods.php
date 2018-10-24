<?php
namespace app\admin\controller;

use think\Controller;

class Goods extends Controller
{
    public function goodslist()
    {
        dump(123);

        return view('goodslist');
    }

    public function goodsAdd(){

        return view('goodsAdd');
    }
}
