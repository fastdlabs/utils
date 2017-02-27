<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */


use FastD\Utils\FileObject;


class FileObjectTest extends PHPUnit_Framework_TestCase
{
    public function testFileExists()
    {
        $file = new FileObject(__DIR__ . '/test.log');

        var_dump($file->fwrite('hello world'));

        $file->fread(10);
    }
}
