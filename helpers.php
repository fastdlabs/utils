<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2018
 *
 * @link      https://www.github.com/fastdlabs
 * @link      https://fastdlabs.com/
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
