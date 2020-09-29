<?php
/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/10/28
 * Time: 上午11:32
 */

namespace Mooc;


class Database
{
    //单例模式
    protected static $db;
    //单例私有属性防止其他地方调用
    private function __construct()
    {

    }
    //单例模式
    static function getInstance()
    {
        self::$db = self::$db ? self::$db : new self();
        return self::$db;
    }

    function where($where)
    {
        var_dump(123);
        return $this;
    }

    function order($order)
    {
        return $this;

    }

    function limit($limit)
    {
        return $this;

    }
}