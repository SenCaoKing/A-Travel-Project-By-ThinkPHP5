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


    public function __construct(){
        parent::__construct();
    }

    /**
     * 公共商品列表
     * @return \think\response\View
     */
    public function goodslist()
    {
        return view('goodslist');
    }

    /**
     * 添加商品
     * @return \think\response\Json|\think\response\View
     */
    public function goodsAdd(){
        if(IS_POST){
            try{
                $file = request()->file('logo');
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
            }catch(\Exception $e){
                return _error($e->getMessage(), $e->getCode());
            }
            return _success();
        }
        return view('goodsAdd');
    }
}
