<?php
/**
 * @licence GPL-v2
 */
namespace Tests\Units;

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
