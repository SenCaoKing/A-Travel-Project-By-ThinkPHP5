<?php
/**
 * created by PhpStrom
 * User: Sen
 * Date: 2018/02/14
 * Time: 14:00
 */
namespace app\admin\controller;
use app\server\Param;
use app\server\Alioss;

class Order extends Base{
    protected $model;

    public function __construct(){
        parent::__construct();
    }

    /**
     * 订单列表
     * @return \think\response\View
     */
    public function orderlist(){
        $search = search($this->params, ['a.order_num'], ['a.create_time'], ['a.status']);
        $where = $search['where'] ?: '';

        $list = $this->order
            ->alias('a')
            ->field('a.*, b.goods_id, c.title')
            ->join([['goods_release b', 'a.goods_release_id = b.id', 'left'], ['goods c', 'b.goods_id = c.id', 'left']])
            ->where($where)
            ->order('a.id desc')
            ->paginate(10, false, ['query'=>$this->params, 'var_page'=>'page']);
        return view('orderList', ['list'=>$list, 'params'=>$search['params']]);
    }
}
