<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2018
 *
 * @link      https://www.github.com/fastdlabs
 * @link      https://fastdlabs.com/
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
