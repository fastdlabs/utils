<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace FastD\Utils;


abstract class Util
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public static function create($data = null)
    {
        return new static($data);
    }

    public function getData()
    {
        return $this->data;
    }
}