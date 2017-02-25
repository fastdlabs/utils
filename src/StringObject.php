<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace FastD\Utils;


class StringObject extends Util
{
    /**
     * @param $glue
     * @return ArrayObject
     */
    public function explode($glue)
    {
        return ArrayObject::create(explode($glue, $this->data));
    }
}