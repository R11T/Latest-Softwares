<?php
/**
 * @licence GPL-v2
 */
namespace App\Libraries;

/**
 * Browser' Data Access Object
 *
 * @author Romain L.
 * @since 0.1
 */
class BrowserDao
{
    public function getAll()
    {
        $db = Singleton::db();
        $res = $db->query('Select * from software');// where type_id = type_id given by type_name = 'browser'

        return false === $res ? $res : $res->fetchAll(Db::FETCH_ASSOC);
    }
}

