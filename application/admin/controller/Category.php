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

                $this->category->insert($this->params);
            }catch(\Exception $e){
                return _error($e->getMessage(), $e->getCode());
            }
            return _success();
        }

        return $this->fetch('category_add');
    }
}
