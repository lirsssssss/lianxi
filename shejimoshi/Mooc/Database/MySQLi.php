<?php

namespace Mooc\Database;


use Mooc\IDatabase;

/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/10/28
 * Time: 下午4:00
 */
class MySQLi implements IDatabase
{
    protected $conn;

    //链接mysql的函数
    function connect($host, $user, $pass, $dbname)
    {
        $conn = mysqli_connect($host,$user,$pass,$dbname);

        if (mysqli_connect_errno($conn))
        {
            echo "连接 MySQL 失败: " . mysqli_connect_error();
        }
        $this->conn = $conn;
    }

    //执行sql语句
    function query($sql)
    {

        return mysqli_query($this->conn,$sql);
    }

    //关闭sql链接
    function close()
    {
        mysqli_close($this->conn);
    }
}