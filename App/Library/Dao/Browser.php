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
 * Browser' Data Access Object
 *
 * @author Romain L.
 * @since 0.1
 */
class Browser
{
    public function getByName($name)
    {
        $db  = \App\Singleton::db();
        $req = $db->prepare('SELECT * from software where software_name = :software_name');
        $req->execute([
            ':software_name' => $name
        ]);

        return $req->fetch($db::FETCH_ASSOC);
    }

    public function getAll()
    {
        $db = \App\Singleton::db();
        $res = $db->query('Select * from software');// where type_id = type_id given by type_name = 'browser'
        return $res->fetchAll(Db::FETCH_ASSOC);
    }

    public function getAllNames()
    {
        $db  = \App\Singleton::db();
        $res = $db->query('SELECT software_name from software');
        return $res->fetchAll($db::FETCH_ASSOC);
    }
}

