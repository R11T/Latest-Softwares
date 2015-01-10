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

use \App\Library\Interfaces\ISoftwareGetable;

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
    public function updateOne(ISoftwareGetable $item)
    {
        $db  = \App\Singleton::db();
        $req = $db->prepare('SELECT software_id
                            FROM software
                            WHERE software_name = :name
                            LIMIT 1
        ');

        $req->execute(['name' => $item->getName()]);
        $res = $req->fetch($db::FETCH_ASSOC);

        if (false === $res) {
            throw new \PDOException('Software unknown');
        } else {
            $softwareId = $res['software_id'];
            $db->beginTransaction();
            $req = $db->prepare('UPDATE software
                          SET software_last_update = :currentTime,
                            software_commercial_name = :commercialName
                          WHERE software_name = :name
                          LIMIT 1
            ');
            $req->execute([
                'name'           => $item->getName(),
                'currentTime'    => time(),
                'commercialName' => $item->getCommercialName(),
            ]);

            foreach ($item->getRelease()->display() as $platformName => $releaseData) {
                $this->addRelease($platformName, $releaseData, $softwareId);
            }
            $db->commit();
        }
        // fetch and update type
        // fetch and update developer
    }

    /**
     * Add a new release, given a platform name and a software id
     *
     * If the platform doesn't exist yet, it will be created on the fly
     *
     * @param string $platformName
     * @param array  $releaseData
     * @param int    $softwareId
     *
     * @return void
     * @access private
     */
    private function addRelease($platformName, array $releaseData, $softwareId)
    {
        $db = \App\Singleton::db();
        $req = $db->prepare('SELECT platform_id
                            FROM platform
                            WHERE platform_name = :name
                            LIMIT 1
        ');

        $req->execute(['name' => $platformName]);
        $res = $req->fetch($db::FETCH_ASSOC);

        if (false === $res) {
            $req = $db->prepare('INSERT INTO platform (platform_name)
                                VALUES (:name)
            ');
            $req->execute(['name' => $platformName]);
            $platformId = $db->lastInsertId();
        } else {
            $platformId = $res['platform_id'];
        }
        $req = $db->prepare('INSERT INTO release (platform_id, software_id, release_major, release_minor, release_patch, release_timestamp)
                            VALUES (:platform, :software, :major, :minor, :patch, :timestamp)
        ');
        $req->execute([
            'platform'  => $platformId,
            'software'  => $softwareId,
            'major'     => $releaseData['major'],
            'minor'     => $releaseData['minor'],
            'patch'     => $releaseData['patch'],
            'timestamp' => $releaseData['timestamp'],
        ]);
    }
}
