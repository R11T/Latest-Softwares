<?php
/**
 * @licence GPL-v2
 */
namespace App\Item;

use \App\Libraries\Interfaces\ISoftwareItemDisplayable;

/**
 * Browser's Data Transport Object
 *
 * Represents data at a T time
 *
 * @since 0.2
 * @author Romain L.
 * @see \Tests\Units\App\Item\Browser
 */
class Browser implements ISoftwareItemDisplayable
{

    private $name;
    private $type;

    public function __construct(array $data)
    {
        $this->name = (string) $data['software_name'];
        $this->type = (int) $data['type_id'];
    }

    public function display()
    {
        return $this->name . ' is a software of type ' . $this->type;
    }

    /**
     * Gets a browser's all data
     *
     * @param string $name
     *
     * @return array
     * @access public
     */
    /*public function getByName($name)
    {
        $data = \App\Singleton::dao()->getByName($name);

        if (0 === count($data)) {
            return 'Unknown browser';
        } else {
            foreach ($data as $browser) {
                $line[] = 'id : ' . $browser['software_id'] .', name : ' . $browser['software_name'];
            }
            return $line;
        }
    }

    /**
     * Get all browsers' all data
     *
     * @return array
     * @access public
     */
    /*public function getAll()
    {
        $data = \App\Singleton::dao()->getAll();

        if (0 === count($data)) {
            return 'There is no browser';
        } else {
            foreach ($data as $browser) {
                $line[] = 'id : ' . $browser['software_id'] .', name : ' . $browser['software_name'];
            }
            return $line;
        }
    }

    /**
     * Get all browsers' names
     *
     * @return string
     * @access public
     */
    /*public function getListName()
    {
        $data = \App\Singleton::dao()->getListName();
        if (0 === count($data)) {
            return 'None';
        } else {
            foreach ($data as $browser) {
                $row[] = $browser['software_name'];
            }
            $row[] = 'all';
            return implode(', ', $row);
        }
    }*/
}
