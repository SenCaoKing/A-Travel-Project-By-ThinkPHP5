<?php
/**
 * Created By Phpstorm.
 * User: Sen
 * Date: 2018/11/20
 * Time: 20:00
 */
namespace app\admin\controller;


use think\Exception;
use think\Request;


/**
 * Class Wechatgoods
 * @package app\admin\controller
 * 微信小程序商品添加
 */
class Wechatgoods extends Base {
    /**
     * @return mixed
     * 微信商品列表
     */
    public function index()
    {

        return $this->fetch('index');
    }

    /**
     * @return mixed|\think\response\Json
     * 添加|修改小程序产品
     */
    public function goods()
    {
        if(Request::instance()->isPost()){
            try{
                // 处理图片信息

                $logo = Request::instance()->file('logo');
                $list_img = Request::instance()->file('list_image');
                if(!empty($logo)){
                    $file[] = $logo;
                    $urls = \app\server\Alioss::get_instance()->upload_file($file);
                    $this->params['logo'] = $urls[0];
                }
                if(!empty($list_img)){
                    $file[] = $list_img;
                    $urls = \app\server\Alioss::get_instance()->upload_file($file);
                    $this->params['list_image'] = $urls[0];
                }

                $this->params['create_time'] = date('Y-m-d H:i:s');
                $this->wechat_goods->startTrans();
                if(!$this->params['category_ids']){
                    throw new \Exception('请选择分类信息', -1);
                }
                // 处理规格
                $specification = [];
                if(empty($this->params['id'])){
                    foreach($this->params['specification'] as $key => $value){
                        $type_key = 'type' . $key;
                        $specification[$key]['specification'] = $value;
                        $specification[$key]['original_price'] = $this->params['original_price'][$key];
                        $specification[$key]['current_price'] = $this->params['current_price'][$key];
                        $specification[$key]['unit'] = $this->params['unit'][$key];
                        if(!$this->params[$type_key]){
                            throw new \Exception('请选择分成方式', -1);
                        }
                        $specification[$key]['type'] = $this->params[$type_key];
                        switch($this->params[$type_key]){
                            case 1:
                                if(!$this->params['divided1'][$key]){
                                    throw new \Exception('选择分成方式为底价，但价格未设置', -1);
                                }
                                $specification[$key['divided']] = $this->params['divided1'][$key];
                                break;
                            case 2:
                                if(!$this->params['divided2'][$key]){
                                    throw new \Exception('选择分成方式为抽成，但比例未设置', -1);
                                }
                                $specification[$key]['divided'] = $this->params['divided2'][$key];
                                break;
                            default:
                                throw new \Exception('比例分成设置不正确', -1);
                        }
                    }
                }
                $this->params['spe_num'] = count($specification);
                if($this->params['id']){
                    $this->wechat_goods->update($this->params);
                    $this->goods_category->where(['goods_id' => $this->params['id']])->delete(); // 删除分类信息
                    // $this->goods_specification->where(['goods_id' => $this->params['id']])->delete(); // 删除规格信息
                }else{
                    $this->params['id'] = $this->wechat_goods->insertGetId($this->params);
                    // 插入关联规格
                    foreach($specification as $key => $value){
                        $value['goods_id'] = $this->params['id'];
                        $this->goods_specification->insert($value);
                    }
                }
                // 插入关联分类
                foreach($this->params['category_ids'] as $k => $v){
                    $this->goods_category->insert([
                        'goods_id'    => $this->params['id'],
                        'category_id' => $v
                    ]);
                }

                $this->featured_goods->commit();
            }catch(\Exception $e){
                $this->featured_goods->rollback();
                return _error($e->getMessage(), $e->getCode());
            }
            return _success();
        }




        $area = $this->area->where(['pid' => 0])->select(); // 查询地区
        $category = $this->category->where(['p_id' => 0, 'type' => 1])->select(); // 选择——分类
        foreach($category as $key => $value){
            $category[$key]['child'] = $this->category->where(['p_id' => $value['id']])->select();
        }
        // 查询当前合作商户(管理员)【合作商户group_id为 2】
        $merchat_group = $this->auth_group_access
            ->alias('a')
            ->join([['admin b', 'a.uid = b.id', 'left']])
            ->field("b.id, b.username")
            ->where(['a.group_id' => 2])
            ->select();

        // dump($merchat_group);

        return $this->fetch('goods', [
            'area'           => $area,
            'category'       => $category,
            'merchant_group' => $merchat_group ? $merchat_group : [],
        ]);
    }


}
