<?php
/**
 * @licence GPL-v2
 * Summary :
 * « You may copy, distribute and modify the software as long as
 * you track changes/dates of in source files and keep all modifications under GPL.
 * You can distribute your application using a GPL library commercially,
 * but you must also disclose the source code. »
 *
 * @link https://www.tldrlegal.com/l/gpl2
 * @see LICENSE file
 */
namespace App;

/**
 * App singletons objects
 *
 * @since 0.1
 * @author Romain L.
 */
class Singleton
{
    /**
     * Array of application singletons
     *
     * @var array
     *
     * @access private
     * @static
     */
    private static $singleton = [];



    public static function __callStatic($method, array $value = [])
    {
        if (empty($value)) {
            return self::get($method);
        } else {
            self::set($method, $value);
        }
    }

    /**
     * Get a singleton key
     *
     * @param string $key
     *
     * @return object
     * @throw \LogicException if requested key doesn't exist
     */
    private static function get($key)
    {
        if (!isset(self::$singleton[$key])) {
            return null;
        }
        return self::$singleton[$key];
    }

    /**
     * Set a singleton key
     *
     * @param string $key
     * @param array  $value
     *
     * @return void
     * @throw \LogicException  if key already exists
     * @throw \DomainException if value isn't an object
     */
    private static function set($key, array $value)
    {
        if (isset(self::$singleton[$key])) {
            throw new \LogicException('Overwrite ' . $key . ' isn\'t allowed');
        }
        if (1 < count($value)) {
            throw new \OutOfBoundsException('Only one value is allowed');
        }
        if (!is_object($value[0])) {
            throw new \DomainException($key . ' isn\'t an object');
        }
        self::$singleton[$key] = $value[0];
    }
}
