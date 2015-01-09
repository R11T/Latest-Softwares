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
        $dao = $this->namespaces->getDaoName('octavian');

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
        $factory = $this->namespaces->getFactoryName('tiberius');

        $this->string($factory)->isIdenticalTo('\App\Library\Factory\Tiberius');
    }

    public function testGetFetcherName()
    {
        $fetcher = $this->namespaces->getFetcherName('caligula');

        $this->string($fetcher)->isIdenticalTo('\App\Fetcher\Caligula');
    }
}
