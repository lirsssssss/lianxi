<?php
/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/10/30
 * Time: 下午2:34
 */

namespace Mooc;


class ColorDrawDecorator implements DrawDecorator
{

    protected $color;
    function __construct($color = 'red')
    {
        $this->color = $color;
    }

    function beforeDraw()
    {
         // TODO: Implement beforeDraw() method.
        echo "<div style='color:{$this->color};'>";

    }

    function afterDraw()
    {
        // TODO: Implement afterDraw() method.
        echo "</div>";
    }

}