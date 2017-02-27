<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
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
