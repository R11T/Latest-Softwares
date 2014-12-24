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
    public function getByName($name)
    {
        $db  = \App\Singleton::db();
        $req = $db->prepare('SELECT * from software where software_name = :software_name');
        $req->execute([
            ':software_name' => $name
        ]);

        return $req->fetchAll($db::FETCH_ASSOC);
    }

    public function getAll()
    {
        $db = \App\Singleton::db();
        $res = $db->query('Select * from software');// where type_id = type_id given by type_name = 'browser'
        return $res->fetchAll(Db::FETCH_ASSOC);
    }

    public function getListName()
    {
        $db  = \App\Singleton::db();
        $res = $db->query('SELECT software_name from software');
        return $res->fetchAll($db::FETCH_ASSOC);
    }
}

