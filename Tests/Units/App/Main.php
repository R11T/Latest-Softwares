<?php
/**
 * @licence GPL-v2
 */
namespace Tests\Units\App;

use \Tests\Units\TestCase;
use \App\Singleton as Singleton;
use \App\Main as _Main;

/**
 * Unit testing on the main controller
 *
 * @since 0.1
 * @author Romain L.
 * @see \App\Main
 */
class Main extends TestCase
{
    /**
     * Tested class
     *
     * @var \App\Main
     *
     * @access private
     */
    private $main;

    /**
     * Settings routine
     *
     * @return void
     * @access public
     */
    public function beforeTestMethod()
    {
	    $this->main  = new _Main();
	    $this->mockGenerator()->orphanize('__construct');
	    $router      = new \mock\App\Router;
	    $response    = new \mock\App\Libraries\Io\Response;
	    Singleton::router($router);
	    Singleton::response($response);
        $mainFactory = new \mock\App\Libraries\Factory;
        Singleton::mainFactory($mainFactory);
    }

	/**
	 * Tests running help
	 *
	 * @return void
	 * @access public
	 */
	public function testRunHelp()
	{
        Singleton::router()->getMockController()->getAction       = 'help';
        Singleton::router()->getMockController()->getSoftwareType = null;

        $run = $this->main->run();

        $this->array($run)->hasSize(7);
        $this->string($run[0])->contains('Help');
    }

    /**
     * Tests running non callable action
     *
     * @return void
     * @access public
     */
     public function testRunNonCallable()
     {
        Singleton::router()->getMockController()->getAction       = 'test';
        Singleton::router()->getMockController()->getSoftwareType = null;

        $this->exception(function () {
            $this->main->run();
        })->isInstanceOf('\InvalidArgumentException');
     }

    /**
     * Tests running a callable action without query
     *
     * @return void
     * @access public
     */
    public function testRunWithQueryNull()
    {
        Singleton::router()->getMockController()->getAction       = 'get';
        Singleton::router()->getMockController()->getSoftwareType = null;

        $this->exception(function () {
            $this->main->run();
        })->isInstanceOf('\InvalidArgumentException');
    }

    /**
     * Tests getting when we are requesting all softwares of a given type
     *
     * @return void
     * @access public
     */
    public function testGetWithSoftwareNameIsAll()
    {
        Singleton::router()->getMockController()->getAction = 'get';
        Singleton::router()->getMockController()->getSoftwareType = 'browser';
        Singleton::router()->getMockController()->getSoftwareName = 'all';
        $factory = new \mock\App\Libraries\Factories\Browser;
        Singleton::mainFactory()->getMockController()->create = $factory;
        $factory->getMockController()->getAll = 'test all';

        $getAll = $this->main->run();

        $this->string($getAll)->isIdenticalTo('test all');
    }

    /**
     * Tests getting when software name is given
     *
     * @return void
     * @access public
     */
    public function testGetWithSoftwareGiven()
    {
        Singleton::router()->getMockController()->getAction = 'get';
        Singleton::router()->getMockController()->getSoftwareType = 'browser';
        Singleton::router()->getMockController()->getSoftwareName = 'chrome';
        $factory = new \mock\App\Libraries\Factories\Browser;
        Singleton::mainFactory()->getMockController()->create = $factory;
        $factory->getMockController()->getByName = 'this is chrome';

        $getAll = $this->main->run();

        $this->string($getAll)->isIdenticalTo('this is chrome');
    }

    /**
     * Tests getting when software name is unknown
     *
     * @return void
     * @access public
     */
    public function testGetWithUnkwown()
    {
        Singleton::router()->getMockController()->getAction = 'get';
        Singleton::router()->getMockController()->getSoftwareType = 'browser';
        Singleton::router()->getMockController()->getSoftwareName = '?';
        $factory = new \mock\App\Libraries\Factories\Browser;
        Singleton::mainFactory()->getMockController()->create = $factory;
        $factory->getMockController()->getAllNames = 'This is Spartaaa';

        $getAll = $this->main->run();

        $this->string($getAll)->isIdenticalTo('This is Spartaaa');
    }
}
