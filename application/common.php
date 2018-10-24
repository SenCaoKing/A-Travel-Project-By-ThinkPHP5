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