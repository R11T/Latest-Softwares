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
     * @return \App\Library\Collection|null if no data was returned
     * @access public
     */
    public function getByName($softwareName)
    {
        $data = Singleton::dao()->getByName($softwareName);

        if (false === $data) {
            return null;
        } else {
            $item = new \App\Item\Browser($data);
            return new \App\Library\Collection($item);
        }
    }

    public function getAll()
    {
    }

    public function getAllNames() // getList
    {
        return ['chrome', 'firefox'];
    }
}
