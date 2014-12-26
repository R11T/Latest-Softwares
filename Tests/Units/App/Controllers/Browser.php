<?php
/**
 * @licence GPL-v2
 */
namespace Tests\Units\App\Controllers;

use \Tests\Units\TestCase;
use \App\Singleton;
use \App\Controllers\Browser as _Browser;

/**
 * Unit testing on browser' controller
 *
 * @since 0.1
 * @author Romain L.
 * @see \App\Controllers\Browser
 */
class Browser extends TestCase
{
    /**
     * Tested clas
     *
     * @var \App\Controllers\Browser
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
        $this->browser = new _Browser();
        $model         = new \mock\App\Models\Browser;
        Singleton::model($model);
    }

    /**
     * Tests getting browsers' help
     *
     * @return void
     * @access public
     */
    public function testGetHelp()
    {
        Singleton::model()->getMockController()->getListName = 'test, test2';

        $get = $this->browser->get();

        $this->string($get)->isIdenticalTo('Browsers options availables : test, test2');
    }

    /**
     * Tests getting browsers' all data
     *
     * @return void
     * @access public
     */
    public function testGetAll()
    {
        Singleton::model()->getMockController()->getAll = 'doge';

        $get = $this->browser->get('all');

        $this->string($get)->isIdenticalTo('doge');
    }

    /**
     * Tests getting one browser's data
     *
     * @return void
     * @access public
     */
    public function testGetOne()
    {
        Singleton::model()->getMockController()->getByName = 'One ring to rule them all';

        $get = $this->browser->get('oneRing');

        $this->string($get)->isIdenticalTo('One ring to rule them all');
    }
}
