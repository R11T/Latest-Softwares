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
 * Define a software factory as Getable
 *
 * @since 0.2
 * @author Romain L.
 */
interface ISoftwareFactoryGetable extends IFactoryGetable
{
    /**
     * Get all data of a software, given its name and its type
     *
     * @param string $softwareName
     * @param string $softwareType
     *
     * @access public
     */
    public function getByName($softwareName, $softwareType);

    /**
     * Get all data of all softwares of a type
     *
     * @param string $softwareType
     *
     * @access public
     */
    public function getAll($softwareType);

    /**
     * Get all item names of a software type
     *
     * @param string $softwareType
     *
     * @access public
     */
    public function getAllNames($softwareType);
}
