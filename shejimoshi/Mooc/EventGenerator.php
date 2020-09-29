<?php
/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/10/29
 * Time: 下午4:11
 */

namespace Mooc;


abstract class EventGenerator
{
    private $observers = array();

    function addObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    function notify()
    {
        foreach ($this->observers as $observer)
        {
            $observer->update();
        }
    }
}