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
    public function orderList(){
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

    /**
     * 订单成员信息
     * @return \think\response\View
     */
    public function orderUserList(){
        $search = search($this->params, ['c.real_name', 'c.id_card'], [], []);
        $where = $search['where'] ? $search['where'].' and a.id = '.$this->params['id'] : 'a.id = '.$this->params['id'];

        $list = $this->order
            ->alias('a')
            ->field('a.adult_num, a.child_num, c.*')
            ->join([['order_traveler b', 'a.id = b.order_id', 'left'], ['traveler c', 'b.traveler_id = c.id', 'left']])
            ->where($where)
            ->select();
        $info['id'] = $this->params['id'];
        $info['adult_num'] = $list[0]['adult_num'];
        $info['child_num'] = $list[0]['child_num'];
        return view('orderUserList', ['info'=>$info, 'list'=>$list, 'params'=>$search['params']]);
    }
}