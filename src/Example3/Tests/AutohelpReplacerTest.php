<?php
/**
 * Created by PhpStorm.
 * User: gabornagy
 * Date: 2017. 01. 30.
 * Time: 14:46
 */

namespace Example3\Tests;

use Example3\AutohelpReplacer;

class AutohelpReplacerTest extends \PHPUnit_Framework_TestCase
{

    public function testReplace()
    {

        $tags = array(
            array(
                'id' => '1',
                'language_id' => '1',
                'description' => 'Test description',
                'autohelp_id' => '1',
                'tag' => 'test'
            )
        );

        $string = 'the word test must be replaced';

        $expected = 'the word <span class="autohelp" title="Test description">test</span> must be replaced';

        $replacer = new AutohelpReplacer($tags, '\b');

        $this->assertEquals($expected, $replacer->replace($string));

    }
}