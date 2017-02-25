<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

/**
 * @param $string
 * @return \FastD\Utils\Str
 */
function str ($string) {
    return \FastD\Utils\Str::create($string);
}

/**
 * @param array $array
 * @return \FastD\Utils\Arr
 */
function arr (array $array) {
    return \FastD\Utils\Arr::create($array);
}

/**
 * @param $name
 * @param null $value
 * @return mixed
 */
function env ($name, $value = null)
{
    if (null === $value) {
        return getenv($name);
    }

    return putenv(sprintf('%s=%s', $name, $value));
}
