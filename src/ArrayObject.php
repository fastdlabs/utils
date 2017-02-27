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
class ArrayObject extends \ArrayObject
{
    /**
     * @param array $array
     * @return static
     */
    public static function create(array $array = [])
    {
        return new static($array);
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return 0 >= $this->count();
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

        $this->exchangeArray($merge($this->getArrayCopy(), $array));

        unset($merge);

        return $this;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function find($key)
    {
        if ($this->offsetExists($key)) {
            return $this->offsetGet($key);
        }

        if (false === strpos($key, '.')) {
            throw new \LogicException(sprintf('Array Undefined key %s', $key));
        }

        $keys = explode('.', $key);

        $array = $this->data;
        foreach ($keys as $value) {
            if (!$this->offsetExists($key)) {
                throw new \LogicException(sprintf('Array Undefined key %s', $key));
            }

            $array = $array[$value];
        }
        unset($keys, $key);
        return $array;
    }

    /**
     * @param $glue
     * @return StringObject
     */
    public function implode($glue)
    {
        return StringObject::create(implode($glue, $this->data));
    }

    /**
     * @param ArrayObject $arrayObject
     * @return $this
     */
    public function combine(ArrayObject $arrayObject)
    {
        $array = array_combine(array_keys($this->getArrayCopy()), array_values($arrayObject->getArrayCopy()));

        $this->exchangeArray($array);

        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value)
    {
        $this->data[$key] = $value;

        return $this;
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return $this->offsetExists($key);
    }
}