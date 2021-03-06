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
namespace App\Library\Interfaces;

/**
 * Define an element as displayable
 *
 * @since 0.2
 * @author Romain L.
 */
interface IDisplayable
{
    /**
     * Displays element's content
     *
     * @return string
     * @access public
     */
    public function display();
}
