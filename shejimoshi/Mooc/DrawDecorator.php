<?php
/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/10/30
 * Time: 下午2:30
 */

namespace Mooc;

//装饰器接口
interface DrawDecorator
{
    function beforeDraw();
    function afterDraw();

}