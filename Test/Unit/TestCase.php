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
namespace Test\Unit;

use \atoum;

/**
 * Common unit testing class
 *
 * @since 0.1
 * @author Romain L.
 */
class TestCase extends atoum
{
    /**
     * Intercepts output and returns a string of the output instead
     *
     * @param callable $callable
     * @param array    $paramsCallback
     *
     * @return string
     * @access protected
     */
    protected function outputToString(callable $callable, array $paramsCallback = [])
    {
        ob_start();
        call_user_func_array($callable, $paramsCallback);
        $string = ob_get_contents();
        ob_end_clean();
        return $string;
    }
    
    /**
     * Checks if data is well formed json
     *
     * @param mixed $data
     *
     * @return bool
     * @access protected
     * @links http://subinsb.com/php-check-if-string-is-json
     */
    protected function isJson($data)
    {
        return is_string($data) && is_object(json_decode($data)) && json_last_error() === JSON_ERROR_NONE;
    }
}
