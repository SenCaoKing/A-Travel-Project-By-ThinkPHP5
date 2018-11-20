<?php
/**
 * User: Sen
 * Date: 2018/11/19
 * Time: 20:30
 */
namespace app\admin\controller;
use think\Request;

/**
 * Class Category
 * @package app\admin\controller
 * 分类管理
 */
class Category extends Base {
    public function index()
    {
        $list = $this->category->select();

        $list = infinite($list, 0, 0, 'p_id');

        return $this->fetch('index', [
            'list'  => $list,
            'count' => count($list)
        ]);
    }

    /**
     * @return mixed|\think\response\Json
     * 添加修改分类
     */
    public function categoryAdd()
    {
        if(Request::instance()->isPost()){
            try{
                $file = Request::instance()->file('icon');
                if(!empty($file)){
                    $urls = \app\server\Alioss::get_instance()->upload_file($file);
                    $this->params['icon'] = $urls[0];
                }
                if($this->params['id']){
                    $this->category->update($this->params);
                }else{
                    $this->category->insert($this->params);
                }
            }catch(\Exception $e){
                return _error($e->getMessage(), $e->getCode());
            }
            return _success();
        }
        $top_category = $this->category->where(['p_id' => 0])->select();
        $row = $this->category->where(['id' => $this->params['id']])->find();
        return $this->fetch('category_add', [
            'top_category' => $top_category,
            'row'          => $row
        ]);
    }

    public function del()
    {
        if(Request::instance()->isPost()){
            try{
                $row = $this->category->where(['p_id' => $this->params['id']])->find();
                if($row){
                    return _error('请先删除子分类');
                }
                $this->category->where(['id' => $this->params['id']])->delete();
            }catch(\Exception $e){
                return _error($e->getMessage(), $e->getCode());
            }
            return _success();
        }
    }
}