<?php
/**
 * created by PhpStrom
 * User: Sen
 * Date: 2018/11/11
 * Time: 12:00
 */
namespace app\admin\controller;

use think\Request;

class System extends Base {
    public function base(){
        $config = get_config();
        if(IS_POST){
            try{
                foreach($_POST as $k => $v){
                    if($v != $config[$k]){
                        $this->config->where(['key' => $k])->setField('value', $v);
                    }
                }
            }catch(\Exception $e){
                return _error($e->getMessage(), $e->getCode());
            }
            return _success();
        }
        return view('base', ['config' => $config]);
    }

    /**
     * 地区列表
     * @return \think\response\View
     */
    public function areaList(){
        $search = search($this->params, ['area']);
        $where = $search['where'] ?: '';
        $list = $this->area
            ->where($where)
            ->select();
        if(!$this->params){
            $list = infinite($list);
        }
        $count = count($list);
        return view('areaList', ['list'=>$list, 'params'=>$search['params'], 'count'=>$count]);
    }

    /**
     * 添加地区
     * @return \think\response\Json|\think\response\View
     */
    public function areaAdd(){
        if(IS_POST){
            try{
                $file[] = Request::instance()->file('logo');
                if(!empty($file[0])){
                    $urls = \app\server\Alioss::get_instance()->upload_file($file);
                    $this->params['logo'] = $urls[0];
                }

                // 场景验证
                $validate = $this->validate($this->params, 'Area.add');
                if(true !== $validate){
                    throw new \LogicException($validate, 1000);
                }
                $this->area->insertGetId($this->params);
            }catch(\Exception $e){
                return _error($e->getMessage(), $e->getCode());
            }
            return _success();
        }
        $parent = $this->area->where(['pid'=>0])->select(); // 获取顶级栏目的数据
        return view('areaAdd', ['parent'=>$parent]);
    }

    /**
     * 编辑地区
     * @return \think\response\Json|\think\response\View
     */
    public function areaSave(){


        return view('areaSave');
    }

}
