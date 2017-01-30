<?php
/**
 * Created by PhpStorm.
 * User: gabornagy
 * Date: 2016. 11. 30.
 * Time: 15:44
 */

namespace Example3;

use Example3\Helper\DB;
use Example3\Helper\Registry;

class Replacer
{
    public static function autohelp($string)
    {

        if (!$string) {
            return ;
        }

        $string = stripslashes($string);

        if (Registry::getAutohelpStatus() != 1) {
            return $string;
        }

        $query = DB::readAutohelpTags();

        if (empty($query->rows)) {
            return $string;
        }

        $tagBoundary = Registry::getAutohelpWholeWordReplace() ? '\b' : '';

        $replacer = new AutohelpReplacer($query->rows, $tagBoundary);

        return $replacer->replace($string);

    }
}