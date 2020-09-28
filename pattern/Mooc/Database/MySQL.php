<?php

namespace Mooc\Database;

use Mooc\IDatabase;

/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/10/28
 * Time: 下午4:00
 */
class MySQL implements IDatabase
{
    protected $conn;

    //链接mysql的函数  mysql_* 函数已废弃
    function connect($host, $user, $pass, $dbname)
    {
        $conn = mysql_connect($host,$user,$pass);
        mysql_select_db($dbname,$conn);
        $this->conn = $conn;
    }

    //执行sql语句
    function query($sql)
    {
        $res = mysql_query($sql,$this->conn);

        return $res;
    }

    //关闭sql链接
    function close()
    {
        mysql_close($this->conn);
    }
}