<?php

namespace Example1;
/**
 * Created by PhpStorm.
 * User: gabornagy
 * Date: 2016. 11. 30.
 * Time: 13:09
 */
class Filesystem
{

    public function lowerCase($path)
    {

        $entries = $this->readPath($path);

        return array_map('strtolower', $entries);

    }

    protected function readPath($path)
    {
        return glob((string)$path);
    }

}