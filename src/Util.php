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

    public function toRaw()
    {
        return $this->data;
    }

    public function toArray(){}

    public function toJson(){}

    public function toSerialize(){}

    public function toBinary(){}

    public static function create($data = null)
    {
        return new static($data);
    }
}