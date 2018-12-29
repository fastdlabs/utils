<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2018
 *
 * @link      https://www.github.com/fastdlabs
 * @link      https://fastdlabs.com/
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
