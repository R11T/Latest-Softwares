<?php
namespace App\Libraries\Factories;

use \App\Libraries\Interfaces\ISoftwareFactoryGetable;
use \App\Singleton as Singleton;

/**
 * Browser's factory
 *
 * @since 0.2
 * @author Romain L.
 * @see \Tests\Units\App\Libraries\Factories\Browser
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
            return new \App\Libraries\Collection($item);
        }
    }

    public function getAll()
    {
    }

    public function getAllNames()
    {
    }
}
