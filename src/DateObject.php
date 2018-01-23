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

/**
 * Class DateObject
 * @package FastD\Utils
 */
class DateObject extends DateTime
{
    use MakeTrait;

    /**
     * @param $timestamp
     * @return DateObject
     */
    public static function makeFromTimestamp($timestamp)
    {
        return new static(date('Y-m-d H:i:s', $timestamp));
    }

    /**
     * @return string
     */
    public function ago()
    {
        $diff = time() - $this->getTimestamp();

        if ($diff > 0) {
            $tag = '前';
        } else {
            $tag = '后';
        }

        foreach ([
                     '31536000' => '年',
                     '2592000' => '个月',
                     '604800' => '星期',
                     '86400' => '天',
                     '3600' => '小时',
                     '60' => '分钟',
                     '1' => '秒',
                 ] as $key => $value) {
            if (0 != $c = floor(abs($diff) / (int)$key)) {
                return $c.$value.$tag;
            }
        }

        return '刚刚';
    }

    /**
     * @return string
     */
    public function getMonthTotalDay()
    {
        return $this->format('t');
    }

    /**
     * @return static
     */
    public function getMonthFirstDay()
    {
        return new static(date('Y-m-01', $this->getTimestamp()));
    }

    /**
     * @return static
     */
    public function getMonthLastDay()
    {
        $date = $this->format('Y-m-d');

        return new static(date('Y-m-d', strtotime($date.' +1 month -1 day')));
    }

    /**
     * @return static
     */
    public function getWeekFirstDay()
    {
        $date = $this->format('Y-m-d');

        $week = $this->format('w');

        return new static(date('Y-m-d', strtotime("$date -".($week ? $week - 1 : 6).' days')));
    }

    /**
     * @return static
     */
    public function getWeekLastDay()
    {
        return new static(date('Y-m-d', strtotime($this->getWeekFirstDay()->format('Y-m-d').' +6 days')));
    }
}