<?php
/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/10/28
 * Time: 下午3:23
 */

namespace Mooc;


//注册树模式
class Register
{
    protected static $objects;


    /**
     * 将一个对象注册到注册数上
     * @param $alias=>映射名
     * @param $obj=>别名
     */
    static function set($alias,$obj)
    {
        self::$objects[$alias] = $obj;
    }

    /**
     * 取出放入的对象
     * @param $name
     * @return mixed
     */
    static function get($name)
    {
        if (!isset(self::$objects[$name]))
        {
            return false;
        }
        return self::$objects[$name];
    }

    /**
     * 从树上移出
     * @param $alias
     */
    function _unset($alias)
    {
        unset(self::$objects[$alias]);
    }
}