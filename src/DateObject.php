<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace FastD\Utils;


use DateTime;
use DateTimeZone;

/**
 * Class DateObject
 * @package FastD\Utils
 */
class DateObject extends Util
{
    /**
     * DateObject constructor.
     * @param string $data
     * @param string $timezone
     */
    public function __construct($data = 'now', $timezone = 'PRC')
    {
        parent::__construct(new DateTime($data, new DateTimeZone($timezone)));
    }

    /**
     * @return int
     */
    public function toTimestamp()
    {
        return $this->data->getTimestamp();
    }

    /**
     * @param $format
     * @return string
     */
    public function format($format)
    {
        return $this->data->format($format);
    }

    /**
     * @return DateTimeZone
     */
    public function getTimezone()
    {
        return $this->data->getTimezone();
    }
}