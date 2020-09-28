<?php
/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/10/29
 * Time: 下午4:11
 */

namespace Mooc;


class Event extends EventGenerator
{
    function trigger()
    {
        echo 'event';
        $this->notify();
    }
}

class Observer1 implements Observer
{
    function update($event_info = null)
    {
        echo "逻辑1 <br>\n";
    }
}

class Observer2 implements Observer
{
    function update($event_info = null)
    {
        echo "逻辑2 <br>\n";
    }
}
