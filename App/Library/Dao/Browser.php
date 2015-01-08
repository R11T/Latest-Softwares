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
namespace App\Library\Dao;

use \App\Library\Interfaces\IItemGetable;

/**
 * Browser' Data Access Object
 *
 * @author Romain L.
 * @since 0.1
 */
class Browser extends Software
{
    /**
     * Returns software type
     *
     * @return string
     * @access public
     */
    public function getType()
    {
        return 'browser';
    }

    /**
     * Update a browser if it exists
     *
     * @param IItemGetable $item
     *
     * @return void
     * @access public
     */
    public function updateOne(IItemGetable $item)
    {
        $db = \App\Singleton::db();
        var_dump($item);

        // recuperation id lié au nom de navigateur
        // si non existant, erreur
        // si existant :
        // debut transaction
        // fetch and update type
        // fetch and update developer
        // maj ligne navigateur
        // maj type
        // maj plateforme
        // maj release

        
    }

    // tries to update a browser. If doesn't exist, abort !
}
