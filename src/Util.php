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
 * Class Util
 * @package FastD\Utils
 */
abstract class Util
{
    /**
     * @var mixed
     */
    protected $data;

    /**
     * Util constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @param null $data
     * @return static
     */
    public static function create($data = null)
    {
        return new static($data);
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}