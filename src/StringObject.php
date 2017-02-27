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
class StringObject
{
    /**
     * @var string
     */
    protected $string;

    /**
     * Util constructor.
     * @param $string
     */
    public function __construct($string)
    {
        $this->string = $string;
    }

    /**
     * @param $string
     * @return static
     */
    public static function create($string)
    {
        return new static($string);
    }

    /**
     * @param $glue
     * @return ArrayObject
     */
    public function explode($glue)
    {
        return ArrayObject::create(explode($glue, $this->string));
    }

    /**
     * @param $needle
     * @param int $offset
     * @return bool|int
     */
    public function hasCharacter($needle, $offset = 0)
    {
        return strpos($this->string, $needle, $offset);
    }

    /**
     * @return string
     */
    public function md5()
    {
        return md5($this->string);
    }

    /**
     * @param $start
     * @param $length
     * @return string
     */
    public function cut($start, $length)
    {
        return substr($this->string, $start, $length);
    }

    /**
     * @return int
     */
    public function length()
    {
        return strlen($this->string);
    }

    /**
     * @param string $char
     * @return string
     */
    public function trim($char = " \t\n\r\0\x0B")
    {
        return trim($this->string, $char);
    }

    /**
     * @param string $char
     * @return string
     */
    public function ltrim($char = " \t\n\r\0\x0B")
    {
        return ltrim($this->string, $char);
    }

    /**
     * @param string $char
     * @return string
     */
    public function rtrim($char = " \t\n\r\0\x0B")
    {
        return rtrim($this->string, $char);
    }

    /**
     * @return string
     */
    public function upper()
    {
        return strtoupper($this->string);
    }

    /**
     * @return string
     */
    public function lower()
    {
        return strtolower($this->string);
    }

    /**
     * @param StringObject $stringObject
     * @return $this
     */
    public function concat(StringObject $stringObject)
    {
        $this->string .= (string) $stringObject;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->string;
    }
}