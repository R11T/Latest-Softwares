<?php
/**
 * @licence GPL-v2
 */
namespace Tests\Units\App\Item;

use \Tests\Units\TestCase;
use \App\Singleton;
use \App\Item\Browser as _Browser;

/**
 * Unit testing on browser's model
 *
 * @since 0.1
 * @author Romain L.
 * @see \App\Item\Browser
 */
class Browser extends TestCase
{
    /**
     * Tested class
     *
     * @var \App\Models\Browser
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
        $dao           = new \mock\App\Libraries\BrowserDao;
        Singleton::dao($dao);
    }

    /**
     * Tests getting browser by name when there is no result
     *
     * @return void
     * @access public
     */
    public function testGetByNameWithNoResult()
    {
        Singleton::dao()->getMockController()->getByName = [];

        $getByName = $this->browser->getByName('test');

        $this->string($getByName)->isIdenticalTo('Unknown browser');
    }

    /**
     * Tests getting browser by name when there are results
     *
     * @return void
     * @access public
     */
    public function testGetByNameWithResult()
    {
        Singleton::dao()->getMockController()->getByName = [
            ['software_id' => 161, 'software_name' => 'Amphitrite'],
            ['software_id' => 314, 'software_name' => 'apple pie']
        ];

        $getByName = $this->browser->getByName('Bond, James Bond');

        $this->array($getByName)->hasSize(2);
        $this->string($getByName[0])->isIdenticalTo('id : 161, name : Amphitrite');
        $this->string($getByName[1])->isIdenticalTo('id : 314, name : apple pie');
    }

    /**
     * Tests getting all browsers' all data without result
     *
     * @return void
     * @access public
     */
    public function testGetAllWithNoResult()
    {
        Singleton::dao()->getMockController()->getAll = [];

        $getAll = $this->browser->getAll();

        $this->string($getAll)->isIdenticalTo('There is no browser');
    }

    /**
     * Tests getting all browsers' all data with results
     *
     * @return void
     * @access public
     */
    public function testGetAllWithResults()
    {
        Singleton::dao()->getMockController()->getAll = [
            ['software_id' => 271, 'software_name' => 'Euler'],
            ['software_id' => 42, 'software_name' => 'Answer']
        ];

        $getAll = $this->browser->getAll();

        $this->string($getAll[0])->isIdenticalTo('id : 271, name : Euler');
        $this->string($getAll[1])->isIdenticalTo('id : 42, name : Answer');
    }

    /**
     * Tests getting all browsers' names when there is no result
     *
     * @return void
     * @access public
     */
    public function testGetListNameWithNoResult()
    {
        Singleton::dao()->getMockController()->getListName = [];

        $getList = $this->browser->getListName();

        $this->string($getList)->isIdenticalTo('None');
    }

    /**
     * Tests getting all browsers' names when there are results
     *
     * @return void
     * @access public
     */
    public function testGetListNameWithResults()
    {
        Singleton::dao()->getMockController()->getListName = [
            ['software_name' => 'Marvin'],
            ['software_name' => 'Ford Prefect']
        ];

        $getListName = $this->browser->getListName();

        $this->string($getListName)->isIdenticalTo('Marvin, Ford Prefect, all');
    }
}
