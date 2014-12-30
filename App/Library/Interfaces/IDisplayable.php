<?php
/**
 * @licence GPL-v2
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
