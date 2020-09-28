<?php
/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/10/28
 * Time: 下午3:03
 */

namespace Mooc;

//工厂类 工厂模式
class Factory
{

    static $proxy = null;

    /**
     * 使用场景 许多地方new一个类 当一个类的名字或参数发生改变时要改很多地方
     * 使用工厂模式只用改工厂模式的名字和参数就可以了
     * @return Database
     */
    static function createDatebase()
    {
        //$obj = new Obj();
        //注册树
        $obj = Register::get("db1");
        if (!$obj){
            //单例
            $obj = Database::getInstance();
            Register::set('db1',$obj);
        }
        return $obj;
    }

    static function getUser($id)
    {
        $key = 'user_'.$id;
        $user = Register::get($key);
        if (!$user){
            $user = new User($id);
            Register::set($key,$user);
        }
        return $user;
    }

    static function getDatabase($id = 'proxy')
    {

        $key = 'database_'.$id;
        $db = Register::get($key);
        if (!$db) {
            $db = new Database\MySQLi();
            $db->connect("localhost","root","root","lhfei");
            Register::set($key, $db);
        }
        return $db;
    }
}