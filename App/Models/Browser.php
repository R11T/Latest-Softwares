<?php
/**
 * @licence GPL-v2
 */
namespace App\Models;

/**
 *
 *
 *
 *
 */
class Browser extends Software
{
    /*
    Foreach software in browsers, fetch latest informations, given its link, its name
    Following this, reorganize json file
    */

    public function getByName($name)
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

    public function getAll()// data understanding
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

    public function getListName()
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
    }
}
