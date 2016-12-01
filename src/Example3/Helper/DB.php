<?php
/**
 * Created by PhpStorm.
 * User: gabornagy
 * Date: 2016. 12. 01.
 * Time: 10:40
 */

namespace Example3\Helper;

class DB
{
    static public function readAutohelpTags()
    {
        $query = new \stdClass;
        $query->rows = array(
            array('tag'=>'dummy','description'=>'this is a dummy description'),
            array('tag'=>'Lorem','description'=>'Donec eget condimentum'),
            array('tag'=>'ipsum','description'=>'consectetur pellentesque lacus'),
            array('tag'=>'sum','description'=>'Cras orci lacus, mattis eget dignissim non'),
        );

        return $query;
    }
}