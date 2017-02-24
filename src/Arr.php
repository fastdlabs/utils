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
     */
    public function key($key)
    {
        try {
            if (array_key_exists($key, $this->array)) {
                return $this->array[$key];
            }

            if (false === strpos($name, '.')) {
                throw new ConfigUndefinedException($name);
            }

            $keys = explode('.', $name);
            $parameters = $this->bag;

            foreach ($keys as $value) {
                if (!array_key_exists($value, $parameters)) {
                    throw new ConfigUndefinedException($name);
                }

                $parameters = $parameters[$value];
            }
            return $parameters;
        } catch (ConfigException $e) {
            return $default;
        }
    }
}