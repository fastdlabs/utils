<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @see      https://www.github.com/janhuang
 * @see      http://www.fast-d.cn/
 */

namespace FastD\Utils;


/**
 * Class EnvironmentObject
 * @package FastD\Utils
 */
class EnvironmentObject
{
    use MakeTrait;

    /**
     * @return bool
     */
    public function isCli()
    {
        return 'cli' === php_sapi_name();
    }

    public function isLocal()
    {
        return '127.0.0.1' === $this->getLocalIp();
    }

    /**
     * @return string
     */
    public function getHostName()
    {
        return gethostname();
    }

    /**
     * @return string
     */
    public function getLocalIp()
    {
        return gethostbyname($this->getHostName());
    }
}