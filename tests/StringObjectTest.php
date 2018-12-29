<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2018
 *
 * @link      https://www.github.com/fastdlabs
 * @link      https://fastdlabs.com/
 */


use FastD\Utils\StringObject;


class StringObjectTest extends PHPUnit_Framework_TestCase
{
    public function testExplode()
    {
        $string = new StringObject('hello world');

        $array = $string->explode(' ');

        $this->assertEquals($array->find(0), 'hello');
    }
}
