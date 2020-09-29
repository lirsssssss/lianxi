<?php
/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/10/29
 * Time: 上午10:08
 */

namespace Mooc;


class FemaleUserStrategy implements  UserStrategy
{
    function showAd()
    {
        // TODO: Implement showAd() method.
        echo '2019女装';
    }

    function showCategory()
    {
        // TODO: Implement showCategory() method.
        echo '女装';
    }

}