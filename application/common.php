<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

/**
 * @param array $data
 * @param string $msg
 * @param int $code
 * @return \think\response\Json
 * 成功格式化参数
 */
function _success($data = [], $msg = '操作成功', $code = 0){
    return _error($msg, $code, $data);
}



/**
 * @param string $message
 * @param int $code
 * @param array $data
 * @return \think\response\Json
 * 失败格式化参数
 */
function _error($message = '操作失败', $code = -1, $data = []){
    return json([
        'msg'  => $message,
        'code' => $code,
        'data' => $data
    ]);
}

/**
 * @param array $list
 * @param int $parent_id
 * @param int $deep
 * @return array|void
 */
function rule_infinite($list = [], $parent_id = 0, $deep = 0){
    static $arr = [];
    foreach($list as $v){
        if($v['p_id'] == $parent_id){
            $v['deep'] = $deep;
            $arr[] = $v;
            rule_infinite($list, $v['id'], $deep + 1);
        }
    }
    return $arr;
}

/**
 * @return array
 * @throws \think\db\exception\DataNotFoundException
 * @throws \think\db\exception\ModelNotFoundException
 * @throws \think\exception\DbException
 */
function get_config(){
    // 获取配置文件信息
    $list = db('config')->select();
    $config = [];
    if(!empty($list)){
        foreach($list as $v){
            $config[$v['key']] = $v['value'];
        }
    }
    return $config;
}