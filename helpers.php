<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

if (!function_exists('env')) {
    /**
     * @param $name
     * @param null $value
     * @return mixed
     */
    function env($name, $value = null)
    {
        if (null === $value) {
            return getenv($name);
        }

        return putenv(sprintf('%s=%s', $name, $value));
    }
}
