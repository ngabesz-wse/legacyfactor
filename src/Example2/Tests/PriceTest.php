<?php

namespace Example2\Test;
/**
 * Created by PhpStorm.
 * User: gabornagy
 * Date: 2017. 01. 29.
 * Time: 20:38
 */
class PriceTest extends \PHPUnit_Framework_TestCase
{

    protected $price;

    public function setUp()
    {
        $this->price = $this->getMockBuilder('\Example2\Price')
            ->setMethods(array('getTaxRate'))
            ->getMock();

    }

    public function testCalculateGross()
    {
        $taxRate = 27;
        $source = 100;
        $result = 127;

        $this->price->expects($this->once())->method('getTaxRate')->willReturn($taxRate);

        $this->assertEquals($result,$this->price->calculateGross($source));
    }

}