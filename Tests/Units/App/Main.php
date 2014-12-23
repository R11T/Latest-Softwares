<?php
/**
 * @licence GPL-v2
 */
namespace Tests\Units\App;

use \Tests\Units\TestCase;
use \App\Singleton;
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

    /**
     * Tests running with a non existent class called
     *
     * @return void
     * @access public
     */
    public function testRunWithNonExistentClass()
    {
        Singleton::router()->getMockController()->getAction = 'get';
        Singleton::router()->getMockController()->getQuery  = 'Fantastic!';

        $this->exception(function () {
            $this->main->run();
        })->isInstanceOf('\DomainException');
    }

    /**
     * Tests running with existent class called
     *
     * @return void
     * @access public
     */
    public function testRunWithExistentClass()
    {
        Singleton::router()->getMockController()->getAction = 'get';
        Singleton::router()->getMockController()->getQuery  = 'browser';

        $this->when(function () {
            $this->outputToString([$this->main, 'run']);
        })->mock(Singleton::response())->call('display')->once();
    }
}
