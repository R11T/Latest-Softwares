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
            Singleton::factory(new $factoryName());
            return Singleton::factory();
        } else {
            throw new \DomainException('"' . $type . '" factory doesn\'t exist');
        }
    }
}
