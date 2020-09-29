<?php

namespace Mooc;


class Obj
{
    protected $array = [];

    function __set($name, $value)
    {
        var_dump(__METHOD__);
        $this->array[$name] = $value;
    }

    function __get($name)
    {
        var_dump(__METHOD__);
        return $this->array[$name];
    }

    function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        var_dump(__METHOD__);
        var_dump($name,$arguments);
        return "magic function\n";
    }

    static function __callStatic($name, $arguments)
    {
        // TODO: Implement __callStatic() method.
        var_dump(__METHOD__);
        var_dump($name,$arguments);
        return "magic static function\n";
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return __CLASS__;
    }

    public function __invoke($param)
    {
        // TODO: Implement __invoke() method.
        var_dump($param);
        return "invoke";
    }
}





