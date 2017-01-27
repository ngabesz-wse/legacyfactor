<?php
/**
 *
 * Nem adhatjuk át új paraméterként mert akkor megváltozna az aláírás
 */

namespace Example2\Solution;

use Example2\Helper\Tax;

class Price
{
    public function calculateGross($net)
    {

        return intval($net) * (($this->getTaxRate() / 100) +1);

    }

    protected function getTaxRate()
    {
        return Tax::getTaxRate();
    }
}