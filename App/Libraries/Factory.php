<?php
namespace App\Libraries;

class Factory
{
    /*public static $factories = [];

    public static function getAllName()
    {
        if (empty($factories))
        {
            self::
        }
        return self::$factories;
    }
    */

    public static function get($softwareType)
    {
        if ('browsers' === $softwareType) {
            return new Factory\Browsers();
        } else {
            throw new Exception('Bad factory');
        }
    }
}
