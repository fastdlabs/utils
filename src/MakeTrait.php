<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2018
 *
 * @see      https://www.github.com/janhuang
 * @see      http://www.fast-d.cn/
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
    public function make($data = [])
    {
        return new static($data);
    }
}