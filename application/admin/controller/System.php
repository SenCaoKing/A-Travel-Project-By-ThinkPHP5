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

}
