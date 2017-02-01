<?php

namespace Example1;
/**
 * Example1
 *
 * When you try to write a test for the lowerCase method you will notice that it
 * has a dependency on the filesystem (using glob()). This makes the method untestable
 * because unit tests must be independent and isolated.
 * A possible solution is to hide the glob function to a separate method in the class.
 *
 *
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