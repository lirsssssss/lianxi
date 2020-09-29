<?php
/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/10/31
 * Time: 下午1:24
 */

namespace Mooc;


interface IUserProxy
{
    function getUserName($id);
    function setUserName($id,$name);
}