<?php
/**
 * @licence GPL-v2
 */
namespace App\Libraries\Io;

/**
 * Response constructor
 *
 * Used to format a response to display
 *
 * @since 0.1
 * @author Romain L.
 * @see \Tests\Units\App\Libraries\Io\Response
 */
 class Response
 {
    /**
     * Print data
     *
     * @param string|array $data
     *
     * @return void
     * @access public
     */
    public function display($data)
    {
        if (!is_array($data)) {
            $data = (array) $data;
        }
        foreach ($data as $line) {
            echo $line . "\n";
        }
    }
 }

