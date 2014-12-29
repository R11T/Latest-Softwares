<?php
/**
 * @licence GPL-v2
 */
namespace App\Libraries;

use \App\Singleton;

/**
 * Main Factory
 *
 * It has in charge to create software factory
 *
 * @since 0.2
 * @author Romain L.
 * @see \Tests\Units\App\Libraries\Factory
 */
class Factory
{
    /**
     * Create software factory 
     *
     * @param string $type Software type
     *
     * @return \App\Libraries\Factories\Browser
     * @access public
     */
    public function create($type)
    {
        $daoName = $this->getDaoName($type);
        if (class_exists($daoName)) {
            Singleton::dao(new $daoName());
        } else {
            throw new \DomainException('"' . $type . '" dao does\'st exist');
        }
        $factoryName = $this->getFactoryName($type);
        if (class_exists($factoryName)) {
            return new $factoryName();
        } else {
            throw new \DomainException('"' . $type . '" factory doesn\'t exist');
        }
    }

    /**
     * Give dao's complete namespace given its name
     *
     * @param string $name
     *
     * @return string
     * @access private
     */
    private function getDaoName($name)
    {
        return DAO_NS . ucfirst($name);
    }

    /**
     * Give factory's complete namespace given its name
     *
     * @param string $name
     *
     * @return void
     * @access private
     */
    private function getFactoryName($name)
    {
        return FACTORIES_NS . ucfirst($name);
    }
}
