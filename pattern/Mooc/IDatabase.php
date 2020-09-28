<?php
/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/10/28
 * Time: 下午4:20
 */

namespace Mooc;

//适配器模式接口
interface IDatabase
{
    function connect($host,$user,$pass,$dbname);
    function query($sql);
    function close();
}