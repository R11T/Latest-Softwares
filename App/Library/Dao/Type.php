<?php
/**
 * @licence GPL-v2
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
     * Get 
     *
     *
     */
    public function getAllNames()
    {
        $db  = \App\Singleton::db();
        $res = $db->query('SELECT type_name from type');
        return $res->fetchAll($db::FETCH_ASSOC);
    }
}

