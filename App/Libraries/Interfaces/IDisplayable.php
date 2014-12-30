<?php
/**
 * @licence GPL-v2
 */
namespace App\Libraries\Interfaces;

/**
 * Define an element as displayable
 *
 * @since 0.2
 * @author Romain L.
 */
interface IDisplayable
{
    /**
     * Display element's content
     *
     * @return mixed
     * @access public
     */
    public function display();
}
