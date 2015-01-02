<?php
/**
 * @licence GPL-v2
 */
namespace App\Library\Interfaces;

/**
 * Define a factory as Getable
 *
 * @since 0.2
 * @author Romain L.
 */
interface IFactoryGetable
{
    /**
     * Get all item names
     *
     * @access public
     */
    public function getAllNames();
}
