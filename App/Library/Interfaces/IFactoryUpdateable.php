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
 * Define a software factory as Saveable
 *
 * @since 0.2
 * @author Romain L.
 */
interface IFactoryUpdateable
{
    /**
     * Update all data of a software, given its name
     *
     * @return void
     * @access public
     */
    public function updateByName($softwareName);
}

