<?php
/**
 * @licence GPL-v2
 */
namespace App\Controllers;

use \App\Libraries;
use \App\Models;

/**
 *
 */
class Browser
{
    private $model;

    /**
     * Get browser' data given a request
     *
     * @param string|null $name Software name
     *
     * @return ?
     * @access public
     */
    public function get($name = null)
    {
        if ('all' === $name) {
            return $this->getAll();
        } elseif (isset($name) && '?' !== $name) {
            return $this->getOne($name);
        } else {
            return $this->getHelp();
        }
    }

    private function getOne($name)
    {
        // get data from only one browser
        return \App\Singleton::model()->getByName($name);
    }

    private function getAll()
    {
        return \App\Singleton::model()->getAll();
    }

    /**
     * Get all options availables for requesting
     *
     * @return string
     * @access private
     */
    private function getHelp()
    {
        $availables = \App\Singleton::model()->getListName();
        return 'Browsers options availables : ' . $availables;
    }
}
