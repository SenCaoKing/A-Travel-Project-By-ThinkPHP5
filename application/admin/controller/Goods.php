<?php
/**
 * created by PhpStrom
 * User: Sen
 * Date: 2018/11/11
 * Time: 23:00
 */
namespace app\admin\controller;
use app\server\Param;
use app\server\Alioss;

class Goods extends Base{
    protected $model;

    public function __construct(){
        parent::__construct();
    }

    /**
     * 公共商品列表
     * @return \think\response\View
     */
    public function goodslist(){
        $search = search($this->params, ['title'], ['create_time'], ['status']);
        $where = $search['where'] ?: '';
        $list = $this->goods_share
            ->alias('a')
            ->where($where)
            ->order('a.id desc')
            ->paginate(1, false, ['query'=>$this->params, 'var_page'=>'page']);
        return view('goodsList', ['list' => $list, 'params' => $search['params']]);
    }

    /**
     * 导游商品列表
     * @return \think\response\View
     */
    public function goodsGuideList(){
        $search = search($this->params, ['b.mobile', 'title'], ['create_time'], ['status']);
        $where = $search['where'] ?: '';
        $list = $this->goods
            ->alias('a')
            ->field('a.*, b.mobile')
            ->join([['guide b', 'a.uid = b.uid', 'left']])
            ->where($where)
            ->order('a.id desc')
            ->paginate(10, false, ['query'=>$this->params, 'var_page'=>'page']);
        return view('goodsGuideList', ['list'=>$list, 'params'=>$search['params']]);
    }

    /**
     * 商品详情
     * @return \think\response\View
     */
    public function goodsShow(){
        switch ($this->params['action']) {
            case 'goodslist': $this->model = $this->goods_share;break;
            case 'goodsguidelist': $this->model = $this->goods;break;
        }
        $info = $this->model->find($this->params['id']);
        $info['action'] = $this->params['action'];
        $info['images'] = $this->goods_images
            ->where(['goods_id'=>$this->params['id'], 'type'=>Param::PRODUCT_PUBLIC])
            ->column('images');
        return view('goodsShow', ['info' => $info]);
    }

    /**
     * 商品状态修改
     * @return \think\response\Json
     */
    public function goodsStatus(){
        switch($this->params['action']){
            case 'goodslist': $this->model = $this->goods_share;break;
            case 'goodsguidelist': $this->model = $this->goods;break;
            case 'goodsreleaselist': $this->model = $this->goods_release;break;
        }
        if(IS_AJAX){
            try{
                $this->model->update(['status'=>$this->params['status'], 'id'=>$this->params['id']]);
            }catch(\Exception $e){
                return _error($e->getMessage(), $e->getCode());
            }
            return _success();
        }
    }

    /**
     * 添加商品
     * @return \think\response\Json|\think\response\View
     */
    public function goodsAdd(){
        if(IS_POST){
            try{
                $file = \Request::instance()->file('logo');
                $urls = Alioss::get_instance()->upload_file($file);
                $this->params['logo'] = $urls[0];
                $this->params['create_time'] = time();
                $this->params['status'] = Param::GOODS_AUDIT_PASS;
                $id = $this->goods_share->insertGetId($this->params);
                if(!$id){
                    throw new \LengthException('添加商品失败', 1000);
                }
                $file1 = request()->file('banner');
                $urls1 = Alioss::get_instance()->upload_file($file1);
                $data = [];
                foreach($urls1 as $k => $v){
                    $data[$k]['images'] = $v;
                    $data[$k]['goods_id'] = $id;
                    $data[$k]['type'] = Param::PRODUCT_PUBLIC;
                }
                $this->goods_banner->insertAll($data);
            } catch (\Exception $e){
                return _error($e->getMessage(), $e->getCode());
            }
            return _success();
        }
        return view('goodsAdd');
    }
}
