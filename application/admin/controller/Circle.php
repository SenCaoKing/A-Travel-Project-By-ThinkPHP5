<?php
/**
 * created by PhpStrom
 * User: Sen
 * Date: 2018/02/20
 * Time: 14:00
 */
namespace app\admin\controller;

class Circle extends Base{
    public function circleList()
    {
        dump(123);
        return view('circlelist');
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
}
