<?php
namespace App\Library\Factory;

use \App\Library\Interfaces\ISoftwareFactoryGetable;
use \App\Singleton as Singleton;

/**
 * Browser's factory
 *
 * @since 0.2
 * @author Romain L.
 * @see \Test\Unit\App\Library\Factory\Browser
 */
class Browser implements ISoftwareFactoryGetable
{
    /**
     * Get all data of a browser, given its name
     *
     * @param string $softwareName
     *
     * @return \App\Item\Browser|null if no data was returned
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

    public function getAll()
    {
    }

    public function getAllNames()
    {
    }
}