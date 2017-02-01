<?php

namespace Example3;

use Example3\Helper\DB;
use Example3\Helper\Registry;

/**
 * Example3
 *
 * At first sight this looks like very similar to the second example.
 * You can see a couple of static calls that could be hidden in methods like earlier
 * but in this case it will not work.
 * The problem is that our main method is static too so you cant create a mock of it.
 * In this case the only solution is to move the logic into a separate class which is not static and
 * set the return values of static methods to our new class and write tests for it.
 *
 * Created by PhpStorm.
 * User: gabornagy
 * Date: 2016. 11. 30.
 * Time: 15:44
 */
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