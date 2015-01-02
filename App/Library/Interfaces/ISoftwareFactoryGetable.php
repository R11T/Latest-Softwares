<?php
/**
 * @licence GPL-v2
 */
namespace App\Library\Interfaces;

/**
 * Define a software factory as Getable
 *
 * @since 0.2
 * @author Romain L.
 */
interface ISoftwareFactoryGetable extends IFactoryGetable
{
    /**
     * Get all data of software, given its name
     *
     * @param string $softwareName
     *
     * @access public
     */
    public function getByName($softwareName);

    /**
     * Get all data of all softwares
     *
     * @access public
     */
    public function getAll();
}
