<?php
/**
 * @licence GPL-v2
 */
namespace Test\Unit\App\Library;

use \Test\Unit\TestCase;
use \App\Library\Namespaces as _Namespaces;

/**
 * Unit testing on namespace getter class
 *
 * @since 0.3
 * @author Romain L.
 * @see \App\Library\Namespaces
 */
class Namespaces extends TestCase
{
    /**
     * Tested class
     *
     * @var \App\Library\Namespaces
     *
     * @access private
     */
    private $namespaces;

    /**
     * Setting routine
     *
     * @return void
     * @access public
     */
    public function beforeTestMethod()
    {
        $this->namespaces = new _Namespaces();
    }

    /**
     * Test getting dao name
     *
     * @return void
     * @access public
     */
    public function testGetDaoName()
    {
        $dao = $this->namespaces->getDaoName('Octavian');

        $this->string($dao)->isIdenticalTo('\App\Library\Dao\Octavian');
    }

    /**
     * Test getting factory name
     *
     * @return void
     * @access public
     */
    public function testGetFactoryName()
    {
        $factory = $this->namespaces->getFactoryName('Tiberius');

        $this->string($factory)->isIdenticalTo('\App\Library\Factory\Tiberius');
    }
}
