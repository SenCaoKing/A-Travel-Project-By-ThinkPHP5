<?php
/**
 * User: Sen
 * Date: 2018/10/24
 * Time: 20:00
 */
namespace app\admin\controller;
use think\Controller;

class Menu extends Controller {

    /**
     * @param $name
     * @return mixed|\think\db\Query
     */
    public function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->$name = \think\Db::name($name);
    }

    /**
     * @param $name
     * @param $value
     * @return $name;
     */
    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        return $this->$name = $value;
    }


}
