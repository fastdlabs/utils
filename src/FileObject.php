<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace FastD\Utils;


use SplFileObject;

class FileObject extends SplFileObject
{
    protected $exists = true;

    protected $filename;

    public function __construct($filename, $mode = 'r', $include = false, $context = null)
    {
        $this->filename = $filename;

        if (!file_exists($filename)) {
            $this->exists = false;
            $filename = 'php://temp';
        }

        parent::__construct($filename, $mode, $include, $context);
    }

    /**
     * @return bool
     */
    public function isExists()
    {
        return $this->exists;
    }

    /**
     * @param $mode
     * @param $recursion
     * @return bool
     */
    public function make($mode = 0755, $recursion = true)
    {
        if (!file_exists(dirname($recursion))) {
            mkdir(dirname($recursion), $mode, $recursion);
        }

        if (true === touch($this->filename)) {
            $this->exists = true;
            print_r($this);
            $this->__construct($this->filename);
            return true;
        }

        return false;
    }
}