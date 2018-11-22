<?php
/**
 * Created By Phpstorm.
 * User: Sen
 * Date: 2018/11/20
 * Time: 20:00
 */
namespace app\admin\controller;


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
