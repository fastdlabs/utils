<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2018
 *
 * @link      https://www.github.com/fastdlabs
 * @link      https://fastdlabs.com/
 */

namespace FastD\Utils;


use ArrayObject as SPLArray;
use LogicException;

/**
 * Class ArrayObject
 * @package FastD\Utils
 */
class ArrayObject extends SPLArray
{
    use MakeTrait;

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return 0 >= $this->count();
    }

    /**
     * @param $array
     * @return ArrayObject
     */
    public function merge($array): ArrayObject
    {
        $merge = function ($array1, $array2) use (&$merge) {
            foreach ($array2 as $key => $value) {
                if (array_key_exists($key, $array1) && is_array($value)) {
                    if (is_array($array1[$key])) {
                        $array1[$key] = $merge($array1[$key], $value);
                    } else {
                        array_unshift($value, $array1[$key]);
                        $array1[$key] = $value;
                    }
                } else {
                    if (is_string($key)) {
                        $array1[$key] = $value;
                    } else {
                        $array1[] = $value;
                    }
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
            throw new LogicException(sprintf('Array Undefined key %s', $key));
        }

        $value = $this->getArrayCopy();
        $keys = explode('.', $key);
        foreach ($keys as $name) {
            if ( ! isset($value[$name])) {
                throw new LogicException(sprintf('Array Undefined key %s', $key));
            }

            $value = $value[$name];
        }
        unset($keys, $key);

        return $value;
    }

    /**
     * @param $glue
     * @return StringObject
     */
    public function implode($glue): StringObject
    {
        return StringObject::make(implode($glue, $this->data));
    }

    /**
     * @param ArrayObject $arrayObject
     * @return ArrayObject
     */
    public function combine(ArrayObject $arrayObject): ArrayObject
    {
        $array = array_combine(array_keys($this->getArrayCopy()), array_values($arrayObject->getArrayCopy()));

        $this->exchangeArray($array);

        return $this;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->offsetGet($key);
    }

    /**
     * @param $key
     * @param $value
     * @return ArrayObject
     */
    public function set($key, $value): ArrayObject
    {
        $this->offsetSet($key, $value);

        return $this;
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key): bool
    {
        return $this->offsetExists($key);
    }
}