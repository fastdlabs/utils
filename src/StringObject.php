<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace FastD\Utils;


/**
 * Class StringObject
 * @package FastD\Utils
 */
class StringObject extends Util
{
    /**
     * @param $glue
     * @return ArrayObject
     */
    public function explode($glue)
    {
        return ArrayObject::create(explode($glue, $this->data));
    }

    /**
     * @param $needle
     * @param int $offset
     * @return bool|int
     */
    public function strpos($needle, $offset = 0)
    {
        return strpos($this->data, $needle, $offset);
    }

    /**
     * @return string
     */
    public function md5()
    {
        return md5($this->data);
    }

    public function substr($start, $length)
    {
        return substr($this->data, $start, $length);
    }

    /**
     * @return int
     */
    public function length()
    {
        return strlen($this->data);
    }
}