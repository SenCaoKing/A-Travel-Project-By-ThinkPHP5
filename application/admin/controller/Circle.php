<?php
/**
 * created by PhpStrom
 * User: Sen
 * Date: 2018/02/20
 * Time: 14:00
 */
namespace app\admin\controller;

class Circle extends Base{
    /**
     * 列表
     * @return \think\response\View
     */
    public function circleList(){
        $search = search($this->params, ['title'], [], ['is_hot']);
        $where  = $search['where'] ?: '';
        $list   = $this->circle
            ->where($where)
            ->order('id desc')
            ->paginate(10, false, ['query' => $this->params, 'var_page' => 'page']);
        return view('circleList', ['list' => $list, 'params' => $search['params']]);
    }

    /**
     * 添加圈子
     * @return \think\response\Json \think\response\View
     */
    public function circleAdd(){
        if(IS_POST){
            try{
                // 登录场景验证
                $validate = $this->validate($this->params, 'Circle.add');
                if(true !== $validate){
                    throw new \LogicException($validate, 1000);
                }
                $this->circle->insertGetId($this->params);
            } catch (\Exception $e){
                return _error($e->getMessage(), $e->getCode());
            }
            return _success();
        }
        return view('circleAdd');
    }

    /**
     * 编辑圈子
     * @return \think\response\Json|\think\response\View
     */
    public function circleSave(){
        if(IS_POST){
            try{
                // 登录场景验证
                $validate = $this->validate($this->params, 'Circle.save');
                if(true !== $validate){
                    throw new \LogicException($validate, 1000);
                }
                $this->circle->update($this->params);
            } catch (\Exception $e){
                return _error($e->getMessage(), $e->getCode());
            }
            return _success();
        }
        $info = $this->circle->where(['id' => $this->params['id']])->find();
        return view('circleSave', ['info' => $info]);
    }

    public function circleDel(){
        if(IS_POST){
            try{
                $this->circle->delete($this->params['id']);
            } catch (\Exception $e){
                return _error($e->getMessage(), $e->getCode());
            }
            return _success();
        }
    }
}