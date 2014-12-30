<?php
/**
 * @licence GPL-v2
 */
namespace App\Controller;

use \App\Library;
use \App\Model;

/**
 *
 */
class Browser
{
    /**
     * Get browser's data given a request
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

    /**
     * Get one browser's all data
     *
     * @param string $name Browser's name
     *
     * @return array
     * @access private
     */
    private function getOne($name)
    {
        return \App\Singleton::model()->getByName($name);
    }

    /**
     * Get all browsers' all data
     *
     * @return array
     * @access private
     */
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
