<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace FastD\Utils;


class Str
{
    /**
     * @param $string
     * @return static
     */
    public static function create($string)
    {
        return new static($string);
    }
}