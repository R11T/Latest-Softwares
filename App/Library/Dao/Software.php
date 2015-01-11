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
abstract class Software 
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
        $data       = [];
        $collection = null;
        $db         = \App\Singleton::db();
        $req        = $db->prepare('SELECT software_name AS name,
                                type_name as type,
                                software_last_update AS lastUpdate,
                                software_commercial_name AS commercialName,
                                release_major AS releaseMajor,
                                release_minor AS releaseMinor,
                                release_patch AS releasePatch,
                                release_timestamp AS releaseTimestamp,
                                platform_name AS platform
                              FROM software
                                INNER JOIN type USING (type_id)
                                INNER JOIN release USING (software_id)
                                INNER JOIN platform USING (platform_id)
                              WHERE software_name = :name
                                AND type_name = :type
                              GROUP BY platform_name
                              ORDER BY release_timestamp DESC, platform_id
        ');
        $req->execute([
            'name' => $name,
            'type' => $this->getType()
        ]);

        $res = $req->fetchAll($db::FETCH_ASSOC);
        $data['name']           = (string) $res[0]['name'];
        $data['type']           = (string) $res[0]['type'];
        $data['lastUpdate']     = (int)    $res[0]['lastUpdate'];
        $data['commercialName'] = (string) $res[0]['commercialName'];

        foreach ($res as $row) {
            $dataRelease = [
                'platform'  => (string) $row['platform'],
                'timestamp' => (int)    $row['releaseTimestamp'],
                'major'     => (int)    $row['releaseMajor'],
                'minor'     => (int)    $row['releaseMinor'],
                'patch'     => (int)    $row['releasePatch'],
            ];
            $release = new \App\Item\Release($dataRelease);
            if (null == $collection) {
                $collection = new \App\Library\Collection\Release($release);
            } else {
                $collection->push($release);
            }
        }
        $data['release'] = $collection;
        return $data;
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

    /**
     * Returns software type
     *
     * @return string
     * @access public
     * @abstract
     */
    abstract public function getType();
    
}
