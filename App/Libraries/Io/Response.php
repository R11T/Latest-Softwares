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
     * @param \App\Libraries\Interfaces\ISoftwareItem
     *
     * @return void
     * @access public
     */
    public function display(\Iterator $items)
    {
        foreach ($items as $item) {
            echo $item->current() . "\n";
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

