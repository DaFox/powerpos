<?php
namespace Powerpos;

/**
 * Class Version
 *
 * @package Powerpos
 * @author Jan Thönneßen <jan.thoennessen@googlemail.com>
 */
final class Version {

    /**
     * returns the version
     *
     * @return string
     */
    public static function getVersion() {
        return trim(file_get_contents(dirname(dirname(dirname(__FILE__))) . '/VERSION'));
    }
}