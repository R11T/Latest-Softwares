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

/**
 * Namespace getter class
 *
 * @since 0.3
 * @author Romain L.
 * @see \Test\Unit\App\Library\Namespaces
 */
class Namespaces
{
    /**
     * Give dao's complete namespace given its name
     *
     * @param string $name
     *
     * @return string
     * @access public
     */
    public function getDaoName($name)
    {
        return $this->getNamespace($name, DAO_NS);
    }

    /**
     * Give factory's complete namespace given its name
     *
     * @param string $name
     *
     * @return string
     * @access public
     */
    public function getFactoryName($name)
    {
        return $this->getNamespace($name, FACTORY_NS);
    }

    /**
     * Get a namespace
     *
     * @param string $name      Classname
     * @param string $namespace Namespace
     *
     * @return string
     * @access private
     */
    private function getNamespace($name, $namespace)
    {
        return $namespace . ucfirst($name);
    }
}
