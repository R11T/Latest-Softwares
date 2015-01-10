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
namespace App\Library\Factory;

use \App\Library\Interfaces;
use \App\Singleton as Singleton;

/**
 * Browser's factory
 *
 * @since 0.2
 * @author Romain L.
 * @see \Test\Unit\App\Library\Factory\Browser
 */
class Browser implements Interfaces\ISoftwareFactoryGetable, Interfaces\IFactoryUpdateable
{
    /**
     * Get all data of a browser, given its name
     *
     * @param string $softwareName
     * @param string $softwareType
     *
     * @return \App\Library\Collection|null if no data was returned
     * @access public
     */
    public function getByName($softwareName, $softwareType)
    {
        $data = Singleton::dao()->getByName($softwareName);

        if (0 === count($data)) {
            return null;
        } else {
            $item = new \App\Item\Browser($data);
            return new \App\Library\Collection($item);
        }
    }

    /**
     * Get all data of all browsers
     *
     * @param string $softwareType
     *
     * @return \App\Library\Collection | null if no data was returned
     * @access public
     */
    public function getAll($softwareType)
    {
        $collection = null;
        $data       = Singleton::dao()->getAll($softwareType);

        if (0 === count($data)) {
            return null;
        } else {
            foreach ($data as $row) {
                $item = new \App\Item\Browser($row);
                if (null === $collection) {
                    $collection = new \App\Library\Collection($item);
                } else {
                    $collection->push($item);
                }
            }
            return $collection;
        }
    }

    /**
     * Get all browsers' names
     *
     * @param string $softwareType
     *
     * @return array
     * @access public
     */
    public function getAllNames($softwareType)
    {
        $data = Singleton::dao()->getAllNames($softwareType);

        $names = [];
        foreach ($data as $row) {
            $names[] = $row['software_name'];
        }
        return $names;
    }

    /**
     * Update all data of a software, given its name
     *
     * @param string $softwareName
     * @param string $softwareType
     *
     * @return void
     * @access public
     */
    public function updateByName($softwareName, $softwareType)
    {
        $fetcherName = Singleton::namespaces()->getFetcherName($softwareName);
        $fetcher = new $fetcherName();
        $fetcher->fetchData();

        $data = [
            'name'           => $softwareName,
            'type'           => $softwareType,
            'lastUpdate'     => null,
            'commercialName' => '',
            'release'        => $fetcher->fetchRelease(),
        ];

        //var_dump($fetcher->fetchRelease());

        $item = new \App\Item\Browser($data);
        Singleton::dao()->updateOne($item);
    }
}
