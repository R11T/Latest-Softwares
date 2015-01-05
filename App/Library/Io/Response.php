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

