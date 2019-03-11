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

    /**
     * 添加
     * @return \think\response\Json|\think\response\View
     */
    public function themeAdd(){
        if(IS_POST){
            $theme_label = $this->params['theme_label'];
            unset($this->params['theme_label']);
            try{
                // 场景验证
                $validate = $this->validate($this->params, 'Theme.add');
                if(true !== $validate){
                    throw new \LogicException($validate, 1000);
                }
                $this->params['create_time'] = time();
                $this->params['username'] = 'Sen';
                $id = $this->theme->insertGetId($this->params);
                if ($id) {
                    $data = [];
                    foreach ($theme_label as $k => $v) {
                        $data[] = ['theme_id'=>$id, 'theme_label'=>$v];
                    }
                    $this->theme_label->insertAll($data);
                }
            } catch (\Exception $e){
                return _error($e->getMessage(), $e->getCode());
            }
            return _success();
        }
        $circle_id = $this->params['circle_id'];
        $config = get_config();
        $theme_label = explode(',', $config['theme_label']);
        return view('themeAdd', ['circle_id'=>$circle_id, 'theme_label'=>$theme_label]);
    }

    /**
     * 编辑
     * @return \think\response\Json|\think\response\View
     */
    public function themeSave(){
        if(IS_POST){
            try{
                // 场景验证
                $validate = $this->validate($this->params, 'Theme.save');
                if(true !== $validate){
                    throw new \LogicException($validate, 1000);
                }

                $this->theme->update($this->params);
            } catch (\Exception $e){
                return _error($e->getMessage(), $e->getCode());
            }
            return _success();
        }
        $info = $this->theme->where(['id'=>$this->params['id']])->find();
        $info['label'] = $this->theme_label->where(['theme_id'=>$this->params['id']])->column('theme_label');
        $config = get_config();
        $theme_label = explode(',', $config['theme_label']);
        return view('themeSave', ['info'=>$info, 'theme_label'=>$theme_label]);
    }
}