<?php
/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/10/30
 * Time: 下午2:39
 */

namespace Mooc;


class SizeDrawDecorator implements  DrawDecorator
{
    protected $size;

    function __construct($size = '14px')
    {
        $this->size = $size;
    }

    function beforeDraw()
    {
        // TODO: Implement beforeDraw() method.
        echo "<div style='font-size: {$this->size};'>";
    }

    function afterDraw()
    {
        // TODO: Implement afterDraw() method.
        echo "</div>";
    }
}