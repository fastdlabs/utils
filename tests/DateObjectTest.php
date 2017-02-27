<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */


use FastD\Utils\DateObject;


class DateObjectTest extends PHPUnit_Framework_TestCase
{
    public function testAgo()
    {
        $date = new DateObject();

        $this->assertEquals('刚刚', $date->ago());
    }
}
