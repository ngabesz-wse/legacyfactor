<?php
/**
 * Created by PhpStorm.
 * User: gabornagy
 * Date: 2017. 01. 29.
 * Time: 20:57
 */

namespace Example4\Tests;


class ClearAdminSoapTest extends \PHPUnit_Framework_TestCase
{

    protected $clearAdminSoap;

    protected $soapClient;

    public function setUp()
    {
        $this->clearAdminSoap = $this->getMockBuilder('\Example4\ClearAdminSoap')
            ->setMethods(array('getClient'))
            ->getMock();

        $this->soapClient = $this->getMockBuilder('\SoapClient')
            ->disableOriginalConstructor()
            ->setMethods(array('__soapCall'))
            ->getMock();


        $this->clearAdminSoap->expects($this->once())->method('getClient')->willReturn($this->soapClient);

        $this->clearAdminSoap->__construct();

    }

    public function testCalculateGross()
    {

        $result = array(
            "values" => array(
                "a" => 5,
                "b" => 2,
            )
        );

        $this->soapClient->expects($this->once())->method('__soapCall')->with('AddOssze', $result);

        $this->clearAdminSoap->addOssze(5, 2);

    }

}