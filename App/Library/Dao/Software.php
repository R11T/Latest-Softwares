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
 * Softwares' Data Access Object
 *
 * @author Romain L.
 * @since 0.3
 */
abstract class Software // implements ? for having in children getType()
{
    /**
     * Get all data of a software type, given its name
     *
     * @param string $name
     *
     * @return array|false if no data was returned
     * @access public
     */
    public function getByName($name)
    {
        $db  = \App\Singleton::db();
        $req = $db->prepare('SELECT software_name, software_last_update, type_name
                            FROM software
                              INNER JOIN type USING (type_id)
                            WHERE software_name = :software_name
                              AND type_name = :type_name
                            LIMIT 1
        ');
        $req->execute([
            'software_name' => $name,
            'type_name'     => $this->getType()
        ]);

        return $req->fetch($db::FETCH_ASSOC);
    }
    
    /**
     * Get all data of a software type
     *
     * @return array
     * @access public
     */
    public function getAll()
    {
        $db  = \App\Singleton::db();
        $req = $db->prepare('SELECT software_name, software_last_update, type_name
                            FROM software
                              INNER JOIN type USING (type_id)
                            WHERE type_name = :type_name
        ');
        $req->execute([
            'type_name' => $this->getType()
        ]);
        return $req->fetchAll($db::FETCH_ASSOC);
    }
    
    /**
     * Get all softwares' names
     *
     * @return array
     * @access public
     */
    public function getAllNames()
    {
        $db  = \App\Singleton::db();
        $req = $db->prepare('SELECT software_name
                            FROM software
                              INNER JOIN type USING (type_id)
                            WHERE type_name = :type_name
        ');
        $req->execute([
            'type_name' => $this->getType()
        ]);
        return $req->fetchAll($db::FETCH_ASSOC);
    }
    
}
