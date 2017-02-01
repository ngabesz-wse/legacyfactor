<?php

namespace Example2;

use Example2\Helper\Tax;

/**
 * Example2
 *
 * You can use the new method trick from Example1 here too. It also works with static calls.
 *
 * Created by PhpStorm.
 * User: gabornagy
 * Date: 2016. 11. 30.
 * Time: 15:26
 */
class Price
{
    public function calculateGross($net)
    {
        return intval($net) * (($this->getTaxRate() / 100) + 1);
    }

    protected function getTaxRate()
    {
        return Tax::getTaxRate();
    }
}