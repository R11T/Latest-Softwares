<?php
/**
 * @licence GPL-v2
 */
namespace App\Library\Interfaces;

/**
 * Define an element as measurable
 *
 * @since 0.2
 * @author Romain L.
 */
interface IMeasurable
{
    /**
     * Return element's length
     *
     * @return int
     * @access public
     */
    public function length();
}

