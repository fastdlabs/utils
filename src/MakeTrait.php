<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2018
 *
 * @see      https://www.github.com/fastdlabs
 * @see      https://fastdlabs.com/
 */

namespace FastD\Utils;

/**
 * Trait MakeTrait
 * @package FastD\Utils
 */
trait MakeTrait
{
    /**
     * @param $data
     * @return static
     */
    public static function make($data)
    {
        return new static($data);
    }
}