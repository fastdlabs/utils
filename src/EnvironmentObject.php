<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2018
 *
 * @see      https://www.github.com/fastdlabs
 * @see      https://fastdlabs.com/
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
    public function isCli(): bool
    {
        return 'cli' === php_sapi_name();
    }

    /**
     * @return bool
     */
    public function isLocal(): bool
    {
        return '127.0.0.1' === $this->getLocalIp();
    }

    /**
     * @return string
     */
    public function getHostName(): string
    {
        return gethostname();
    }

    /**
     * @return string
     */
    public function getLocalIp(): string
    {
        return gethostbyname($this->getHostName());
    }
}