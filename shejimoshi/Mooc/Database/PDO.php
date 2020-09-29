<?php

namespace Mooc\Database;

use Mooc\IDatabase;

/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/10/28
 * Time: 下午4:01
 */
class PDO implements IDatabase
{
    protected $conn;

    function connect($host, $user, $pass, $dbname)
    {
        $conn = new \PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        $this->conn = $conn;
    }

    function query($sql)
    {
        return $this->conn->query($sql);
    }

    function close()
    {
        unset($this->conn);
    }


}








