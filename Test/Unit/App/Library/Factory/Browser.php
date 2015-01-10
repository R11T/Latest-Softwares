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
namespace Test\Unit\App\Library\Factory;

use \Test\Unit\TestCase;
use \App\Singleton;
use \App\Library\Factory\Browser as _Browser;

/**
 * Unit testing on the browser factory
 *
 * @since 0.2
 * @author Romain L.
 * @see \App\Library\Factory\Browser
 */
class Browser extends TestCase
{
    /**
     * Tested class
     *
     * @var \App\Library\Factory\Browser
     *
     * @access private
     */
    private $browser;

    /**
     * Setting routine
     *
     * @return void
     * @access public
     */
    public function beforeTestMethod()
    {
        $dao = new \mock\App\Dao\Browser;
        Singleton::dao($dao);
        $this->browser = new _Browser;
    }

    /**
     * Tests getting all data of a browser, without data
     *
     * @return void
     * @access public
     */
    public function testGetByNameWithoutData()
    {
        Singleton::dao()->getMockController()->getByName = [];
        
        $get = $this->browser->getByName('Dr. Mario', 'Luigi');

        $this->variable($get)->isNull();
    }

    /**
     * Tests getting all data of a browser, with data
     *
     * @return void
     * @access public
     */
    public function testGetByNameWithData()
    {
        $data = [
            'name'           => 'Link',
            'type'           => 1,
            'lastUpdate'     => 66,
            'commercialName' => 'Link, son of Hyrule',
            'release'        => [],
        ];
        Singleton::dao()->getMockController()->getByName = $data;

        $get = $this->browser->getByName('Zelda', 'Sheik');

        $this->object($get)->isInstanceOf('\App\Library\Collection');
    }

    /**
     * Tests getting all data of all browsers without data
     *
     * @return void
     * @access public
     */
    public function testGetAllWithoutData()
    {
        Singleton::dao()->getMockController()->getAll = [];

        $get = $this->browser->getAll('Altaïr');

        $this->variable($get)->isNull();
    }

    /**
     * Tests getting all data of all browsers with data
     *
     * @return void
     * @access public
     */
    public function testGetAllWithData()
    {
        $data = [[
            'name'           => 'Samus',
            'type'           => 7,
            'lastUpdate'     => 12345,
            'commercialName' => 'Samus Aran',
            'release'        => [],
        ],[
            'name'           => 'Sam Fisher',
            'type'           => 47,
            'lastUpdate'     => 67890,
            'commercialName' => 'Splinter Cell',
            'release'        => [],
        ],];
        Singleton::dao()->getMockController()->getAll = $data;

        $get = $this->browser->getAll('Adam Jensen');

        $this->object($get)->isInstanceOf('\App\Library\Collection');
        $this->integer($get->length())->isIdenticalTo(2);
    }

    /**
     * Tests getting all browsers' names
     *
     * @return void
     * @access public
     */
    public function testGetAllNames()
    {
        $data = [
            ['software_name' => 'Lara Croft'],
            ['software_name' => 'Prince']
        ];
        Singleton::dao()->getMockController()->getAllNames = $data;

        $get = $this->browser->getAllNames('Sonic');

        $this->string($get[0])->isIdenticalTo('Lara Croft');
        $this->string($get[1])->isIdenticalTo('Prince');
    }

    /**
     * Tests updating a browser
     *
     * @return void
     * @access public
     */
    public function testUpdateByName()
    {
        $namespaces = new \mock\App\Library\Namespaces;
        Singleton::namespaces($namespaces);
        $this->mockGenerator->orphanize('__construct');

        $this->when(function () {
            $this->browser->updateByName('chrome', 'browser');
        })->mock(Singleton::dao())->call('updateOne')->once();
    }
}
