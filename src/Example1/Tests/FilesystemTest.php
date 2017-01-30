<?php

namespace Example1\Test;


/**
 * Created by PhpStorm.
 * User: gabornagy
 * Date: 2017. 01. 29.
 * Time: 19:53
 */
class FilesystemTest extends \PHPUnit_Framework_TestCase
{

    protected $filesystem;


    public function setUp()
    {
        $this->filesystem = $this->getMockBuilder('\Example1\Filesystem')
            ->setMethods(array('readPath'))
            ->getMock();

    }

    public function testLowerCase()
    {
        $source = array('ABC');
        $result = array('abc');

        $this->filesystem->expects($this->once())->method('readPath')->willReturn($source);

        $this->assertEquals($result,$this->filesystem->lowerCase('test'));
    }
}