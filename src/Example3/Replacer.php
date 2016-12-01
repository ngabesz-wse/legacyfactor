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


        $autohelp_words = array();
        $autohelp_tokens = array();
        $autohelp_spans = array();
        $ignored_tags = array();
        $ignored_tokens = array();
        $count_i = 0;
        $count_r = 0;

        // html tagek cseréje #i#[sorszám]# tokenre
        $ignored = array();
        preg_match_all(
            '/<[^<>]+>/',
            $string,
            $ignored
        );
        foreach ($ignored[0] as $ig) {
            $ignored_tags[] = $ig;
            $ignored_tokens[] = '#i#' . $count_i . '#';
            $count_i++;
        }
        $string = str_replace(
            $ignored_tags,
            $ignored_tokens,
            $string
        );
        $tagBoundary = Registry::getAutohelpWholeWordReplace() ? '\b' : '';

        foreach ($query->rows as $r) {

            $tagSafe = preg_quote($r['tag'], '/');

            // autohelp kifejezés előfordulások összegyűjtése (case insensitive)
            $replace = array();
            preg_match_all(
                '/' . $tagBoundary . $tagSafe . $tagBoundary . '/iu',
                $string,
                $replace
            );
            if (!count($replace[0])) {
                continue;
            }

            foreach ($replace[0] as $re) {
                $autohelp_words[] = '/' . $tagBoundary . $tagSafe . $tagBoundary . '/iu';
                $autohelp_tokens[] = '#t#' . $count_r . '#';
                $autohelp_spans[] = '<span class="autohelp" title="' . $r['description'] . '">' . $re . '</span>';
                $count_r++;
            }
        }


        $string = preg_replace(
            $autohelp_words,
            $autohelp_tokens,
            $string
        );

        $string = str_replace(
            $autohelp_tokens,
            $autohelp_spans,
            $string
        );

        $string = str_replace(
            $ignored_tokens,
            $ignored_tags,
            $string
        );
        return $string;

    }
}