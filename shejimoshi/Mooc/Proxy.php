<?php
/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/10/31
 * Time: 下午1:23
 */

namespace Mooc;


class Proxy implements IUserProxy
{
    function getUserName($id)
    {
        // TODO: Implement getUserName() method.
        $db = Factory::getDatabase('slave');
        $db->query("select `username` from user where uid = $id limit 1");

    }

    function setUserName($id,$name)
    {
        // TODO: Implement setUserName() method.
        $db = Factory::getDatabase('master');
        $db->query("update user set `username`= $name where uid = $id limit 1");

    }


}









