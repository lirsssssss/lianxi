<?php
/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/10/29
 * Time: 下午4:12
 */

namespace Mooc;


interface Observer
{

    function update($event_info = null);
}