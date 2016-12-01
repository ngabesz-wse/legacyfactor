<?php
/**
 * Created by PhpStorm.
 * User: gabornagy
 * Date: 2016. 11. 30.
 * Time: 15:28
 */

namespace Example2;


class Tax
{
    public static function getTaxRate()
    {
        $array = array('27','10');
        $array = shuffle($array);
        return $array[0];
    }
}