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
     *
     * @return \App\Library\Collection|null if no data was returned
     * @access public
     */
    public function getByName($softwareName)
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
     * @return \App\Library\Collection | null if no data was returned
     * @access public
     */
    public function getAll()
    {
        $collection = null;
        $data       = Singleton::dao()->getAll();

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
     * @return array
     * @access public
     */
    public function getAllNames()
    {
        $data = Singleton::dao()->getAllNames();

        $names = [];
        foreach ($data as $row) {
            $names[] = $row['software_name'];
        }
        return $names;
    }

    /**
     * Update all data of a software, given its name
     *
     * @return void
     * @access public
     */
    public function updateByName($softwareName)
    {
        $fetcherName = Singleton::namespaces()->getFetcherName($softwareName);
        $fetcher     = new $fetcherName();
        $fetcher->fetchData();

        /*["software_name"]=> string(6) "chrome"
        ["software_last_update"]=>string(10) "1419339211"
        ["software_commercial_name"]=>string(0) ""
        ["release_major"]=> string(1) "0"
        ["release_minor"]=> string(1) "2"
        ["release_patch"]=> string(1) "3"
        ["release_timestamp"]=>string(7) "1126495"
        ["platform_name"]=>string(4) "os x"

*/

        $data = [
            'name'           => $softwareName,
            'type'           => Singleton::router()->getSoftwareType(),
            'commercialName' => '',
            'release'        => $fetcher->fetchRelease(),
        ];
        $item = new \App\Item\Browser($data);
        Singleton::dao()->updateOne($item);
    }
}
