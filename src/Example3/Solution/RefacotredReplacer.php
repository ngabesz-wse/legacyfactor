<?php
/**
 * Statikus a metódus ezért nem működik azt hogy kitesszük a hívásokat
 * új metódusokba
 */

namespace Example3\Solution;


use Example3\Helper\DB;
use Example3\Helper\Registry;

class RefacotredReplacer
{

    public static function autohelp($string)
    {

        if (!$string) {
            return;
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

        $replacer = new AutohelpReplacer($query,$tagBoundary);

        return $replacer->replace($string);

    }
}