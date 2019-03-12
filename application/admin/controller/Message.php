<?php
/**
 * created by PhpStrom
 * User: Sen
 * Date: 2018/03/01
 * Time: 14 :00
 */
namespace app\admin\controller;
use app\server\Param;

class Message extends Base{
    /**
     * 列表
     * @return \think\response\View
     */
    public function messageList(){
        $search = search($this->params, [], [], ['type']);
        $where = $search['where'] ?: '';
        $list = $this->message
            ->where($where)
            ->order('id desc')
            ->paginate(10, false, ['query'=>$this->params, 'var_page'=>'page']);
        return view('messageList', ['list'=>$list, 'params'=>$search['params']]);
    }

    /**
     * 添加
     * @return \think\response\Json|\think\response\View
     */
    public function messageAdd(){
        if(IS_POST){
            try{
                // 场景验证
                $validate = $this->validate($this->params, 'Message.add');
                if(true !== $validate){
                    throw new \LogicException($validate, 1000);
                }
                $this->params['create_time'] = time();
                $this->params['type'] = 1;
                $this->message->insertGetId($this->params);
            } catch (\Exception $e){
                return _error($e->getMessage(), $e->getCode());
            }
            return _success();
        }
        return view('messageAdd');
    }


}
