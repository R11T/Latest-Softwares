<?php
/**
 * @licence GPL-v2
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
