<?php

namespace Example1\Solution;
/**
 * A file műveletet ki kell tennünk
 *
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
        return glob($path);
    }

}