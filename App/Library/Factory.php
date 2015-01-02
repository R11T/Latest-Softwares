<?php
/**
 * @licence GPL-v2
 */
namespace App\Library;

use \App\Singleton;

/**
 * Main Factory
 *
 * It has in charge to create software factory
 *
 * @since 0.2
 * @author Romain L.
 * @see \Test\Unit\App\Library\Factory
 */
class Factory
{
    /**
     * Create software factory 
     *
     * @param string $type Software type
     *
     * @return \App\Library\Interfaces\ISoftwareFactoryGetable
     * @access public
     */
    public function create($type)
    {
        $daoName = Singleton::namespaces()->getDaoName($type);
        if (class_exists($daoName)) {
            Singleton::dao(new $daoName());
        } else {
            throw new \DomainException('"' . $type . '" dao doesn\'t exist');
        }
        $factoryName = Singleton::namespaces()->getFactoryName($type);
        if (class_exists($factoryName)) {
            return new $factoryName();
        } else {
            throw new \DomainException('"' . $type . '" factory doesn\'t exist');
        }
    }
}
