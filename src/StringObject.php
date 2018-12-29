<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2018
 *
 * @link      https://www.github.com/fastdlabs
 * @link      https://fastdlabs.com/
 */

namespace FastD\Utils;


/**
 * Class StringObject
 * @package FastD\Utils
 */
class StringObject
{
    use MakeTrait;

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
     * @param $glue
     * @return ArrayObject
     */
    public function explode($glue): ArrayObject
    {
        return ArrayObject::make(explode($glue, $this->string));
    }

    /**
     * @param $needle
     * @param int $offset
     * @return bool
     */
    public function hasCharacter($needle, $offset = 0): bool
    {
        return false === strpos($this->string, $needle, $offset);
    }

    /**
     * @return string
     */
    public function md5(): string
    {
        return md5($this->string);
    }

    /**
     * @param $start
     * @param $length
     * @return string
     */
    public function cut($start, $length): string
    {
        return substr($this->string, $start, $length);
    }

    /**
     * @return int
     */
    public function length(): int
    {
        return strlen($this->string);
    }

    /**
     * @param string $char
     * @return string
     */
    public function trim($char = " \t\n\r\0\x0B"): string
    {
        return trim($this->string, $char);
    }

    /**
     * @param string $char
     * @return string
     */
    public function ltrim($char = " \t\n\r\0\x0B"): string
    {
        return ltrim($this->string, $char);
    }

    /**
     * @param string $char
     * @return string
     */
    public function rtrim($char = " \t\n\r\0\x0B"): string
    {
        return rtrim($this->string, $char);
    }

    /**
     * @return string
     */
    public function upper(): string
    {
        return strtoupper($this->string);
    }

    /**
     * @return string
     */
    public function lower(): string
    {
        return strtolower($this->string);
    }

    /**
     * @param StringObject $stringObject
     * @return $this
     */
    public function concat(StringObject $stringObject): StringObject
    {
        $this->string .= (string) $stringObject;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->string;
    }
}