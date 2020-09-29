<?php
/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/10/30
 * Time: 下午4:12
 */

namespace Mooc;


class Tconts
{
     const AppID = '12313';

     function __construct()
     {
         self::AppID;
     }

    function index()
     {
         return self::AppID;
     }

}