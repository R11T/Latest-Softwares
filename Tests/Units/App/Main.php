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
	    $this->main = new _Main();
	    $this->mockGenerator()->orphanize('__construct');
	    $router     = new \mock\App\Router;
	    $response   = new \mock\App\Libraries\Io\Response;
	    Singleton::router($router);
	    Singleton::response($response);
    }

	/**
	 * Tests running help
	 *
	 * @return void
	 * @access public
	 */
	public function testRunHelp()
	{
        Singleton::router()->getMockController()->getAction = 'help';
        Singleton::router()->getMockController()->getQuery  = null;

        $this->output(function () {
            $this->main->run();
        })->contains('--- Help ----');
    }

    /**
     * Tests running non callable action
     *
     * @return void
     * @access public
     */
     public function testRunNonCallable()
     {
        Singleton::router()->getMockController()->getAction = 'test';
        Singleton::router()->getMockController()->getQuery  = null;

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
        Singleton::router()->getMockController()->getAction = 'get';
        Singleton::router()->getMockController()->getQuery  = null;

        $this->exception(function () {
            $this->main->run();
        })->isInstanceOf('\InvalidArgumentException');
    }

    // TODO: test run whun function is called

    /**
     * Tests get with class doesn't exist
     *
     * @return void
     * @access public
     */
    public function testGetWithNonExistentClass()
    {
        Singleton::router()->getMockController()->getAction = 'get';
        Singleton::router()->getMockController()->getQuery  = 'browsers';

        $this->exception(function () {
            $this->main->run();
        })->isInstanceOf('\DomainException');
    }

    // TODO: test get non callable method
    // TODO: test get without talking to db
}
