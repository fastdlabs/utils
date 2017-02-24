<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace FastD\Utils;


use ArrayObject;

/**
 * Class Arr
 * @package FastD\Utils
 */
class Arr extends ArrayObject
{
    protected $array;

    /**
     * @param array $array
     * @return static
     */
    public static function create(array $array)
    {
        return new static($array);
    }

    /**
     * @param $array
     * @return $this
     */
    public function merge($array)
    {
        $this->array += $array;

        return $this;
    }
}