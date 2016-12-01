<?php
/**
 * Created by PhpStorm.
 * User: gabornagy
 * Date: 2016. 11. 30.
 * Time: 15:45
 */

namespace Example3\Helper;


class Registry
{
    public static function getAutohelpStatus()
    {
        $array = array(true,false);
        $array = shuffle($array);
        return $array[0];
    }

    public static function getAutohelpWholeWordReplace()
    {
        return self::getAutohelpStatus();
    }
}