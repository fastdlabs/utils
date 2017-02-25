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
 * Class Arr
 * @package FastD\Utils
 */
class Arr extends Util
{
    /**
     * Arr constructor.
     * @param $data
     */
    public function __construct($data)
    {
        parent::__construct((array) $data);
    }

    /**
     * @param $array
     * @return $this
     */
    public function merge($array)
    {
        $merge = function ($array1, $array2) use (&$merge) {
            foreach ($array2 as $key => $value) {
                if (array_key_exists($key, $array1) && is_array($value)) {
                    $array1[$key] = $merge($array1[$key], $array2[$key]);
                } else {
                    $array1[$key] = $value;
                }
            }

            return $array1;
        };

        $this->data = $merge($this->data, ($array));

        return $this;
    }

    /**
     * @param $key
     * @return mixed
     * @throws ArrayKeyIsNotFoundException
     */
    public function key($key)
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }

        if (false === strpos($key, '.')) {
            throw new ArrayKeyIsNotFoundException($key);
        }

        $keys = explode('.', $key);

        $array = $this->data;
        foreach ($keys as $value) {
            if (!array_key_exists($value, $array)) {
                throw new ArrayKeyIsNotFoundException($key);
            }

            $array = $array[$value];
        }
        unset($keys, $key);
        return $array;
    }
}