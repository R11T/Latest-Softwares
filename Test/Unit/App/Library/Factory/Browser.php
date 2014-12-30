<?php
/**
 * @licence GPL-v2
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
        
        $get = $this->browser->getByName('Dr. Mario');

        $this->variable($get)->isNull();
    }

    /**
     * Tests getting all data of a browser, with data
     *
     * @return void
     * @access public
     */
    public function testgetGetByNameWithData()
    {
        $data = ['software_name' => 'Link', 'type_id' => 1];     
        Singleton::dao()->getMockController()->getByName = $data;

        $get = $this->browser->getByName('Zelda');

        $this->object($get)->isInstanceOf('\App\Library\Collection');
    }
}