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
        /**
         * Collectable $items
         *
         * foreach ($items as $item) {
         *  $item->display();
         *
         * }
         *
         * implies that an object must be iterable and displayable and an array as an object too
         *
         */
    }
 }

