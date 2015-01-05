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

/**
 * Types' Data Access Object
 *
 * @since 0.3
 * @author Romain L.
 */
class Type
{
    /**
     * Get all names of softwares types
     *
     * @return array
     * @access public
     */
    public function getAllNames()
    {
        $db  = \App\Singleton::db();
        $res = $db->query('SELECT type_name from type');
        return $res->fetchAll($db::FETCH_ASSOC);
    }
}

