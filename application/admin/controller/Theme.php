<?php
/**
 * created by PhpStrom
 * User: Sen
 * Date: 2018/02/25
 * Time: 14:00
 */
namespace app\admin\controller;

class Theme extends Base{
    /**
     * 列表
     * @return \think\response\View
     */
    public function themeList(){
        $search = search($this->params, ['title'], [], ['is_hot']);
        $where  = $search['where'] ? $search['where'].' and circle_id = '.$this->params['circle_id'] : 'circle_id = '.$this->params['circle_id'];
        $list   = $this->theme
            ->where($where)
            ->order('id desc')
            ->paginate(10, false, ['query' => $this->params, 'var_page' => 'page'])
            ->each(function($item){
                $label = $this->theme_label
                    ->where(['theme_id' => $item['id']])
                    ->column('theme_label');
                $item['theme_label'] = implode(',', $label);
                return $item;
            });
        return view('themeList', ['list' => $list, 'params' => $search['params'], 'circle_id' => $this->params['circle_id']]);
    }

}