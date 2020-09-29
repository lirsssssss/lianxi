<?php
/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/10/29
 * Time: 上午10:10
 */

namespace Mooc;


class MaleUserStrategy implements UserStrategy
{
    function showAd()
    {
        // TODO: Implement showAd() method.
        echo 'iphone11';
    }

    function showCategory()
    {
        // TODO: Implement showCategory() method.
        echo '电子产品';
    }

}