<?php
/**
 * @licence GPL-v2
 */
namespace App\Library\Io;

/**
 * Response constructor
 *
 * Used to format a response to display
 *
 * @since 0.1
 * @author Romain L.
 * @see \Test\Unit\App\Library\Io\Response
 */
 class Response
 {
    /**
     * Displays data
     *
     * @param \Iterator
     *
     * @return void
     * @access public
     */
    public function display(\Iterator $items)
    {
        foreach ($items as $key => $item) {
            echo $item->display() . "\n";
        }
    }
 }

