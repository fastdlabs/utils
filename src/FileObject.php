<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2018
 *
 * @link      https://www.github.com/fastdlabs
 * @link      https://fastdlabs.com/
 */

namespace FastD\Utils;


use SplFileObject;

/**
 * Class FileObject
 * @package FastD\Utils
 */
class FileObject extends SplFileObject
{
    use MakeTrait;

    const DEFAULT_MODE = 'r';

    /**
     * FileObject constructor.
     * @param $filename
     * @param string $mode
     * @param bool $include
     * @param null $context
     */
    public function __construct($filename, $mode = 'r', $include = false, $context = null)
    {
        if (!file_exists($filename)) {
            $parentDir = dirname($filename);
            if (!file_exists($parentDir)) {
                mkdir($parentDir, 0755, true);
            }
            touch($filename);
        }

        parent::__construct($filename, $mode, $include, $context);
    }

    /**
     * @param $data
     * @return FileObject
     */
    public static function make($data): FileObject
    {
        if (is_string($data)) {
            $filename = $data;
            $mode = static::DEFAULT_MODE;
        } else {
            $filename = $data['file'];
            $mode = $data['mode'];
        }

        return new static($filename, $mode);
    }
}