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
	    Singleton::router()->getMockController()->getAction = 'unknown';
        Singleton::router()->getMockController()->getQuery  = null;

        $this->output(function () {
            $this->main->run();
        })->contains('--- Help ----');
	 }

    /**
     * Tests calling existent method
     *
     * @return void
     * @access public
     */
    public function testRunCallableMethod()
    {
	    Singleton::router()->getMockController()->getAction = 'help';
        Singleton::router()->getMockController()->getQuery  = null;

        $this->output(function () {
            $this->main->run();
        })->contains('--- Help ----');
    }

    /**
     * Tests getting data with softwareType is null
     *
     * @return void
     * @access public
     */
     public function testGetSoftwareTypeNull()
     {
        Singleton::router()->getMockController()->getAction = 'get';
        Singleton::router()->getMockController()->getQuery  = null;

        $this->exception(function () {
            $this->main->run();
        })->isInstanceOf('\BadFunctionCallException');
     }

    /**
     * Tests getting existent softwareType
     *
     * @return void
     * @access public
     */
    public function testGetWithExistentSoftwareType()
    {
        Singleton::router()->getMockController()->getAction = 'get';
        Singleton::router()->getMockController()->getQuery  = 'browsers';

        $data = $this->outputToString([$this->main, 'run']);

        $this->boolean($this->isJson($data))->isTrue();
	}

    /**
     * Tests getting non existent softwareType
     *
     * @return void
     * @access public
     */
    public function testGetWithNonExistentSoftwareType()
    {
	    Singleton::router()->getMockController()->getAction = 'get';
        Singleton::router()->getMockController()->getQuery  = 'Fantastic!';

        $this->exception(function () {
            $this->main->run();
        })->isInstanceOf('\BadFunctionCallException');
	}

    /**
     * Tests updating data without software type
     *
     * @return void
     * @access public
     */
     public function testUpdateWithoutSoftwareType()
     {
        Singleton::router()->getMockController()->getAction = 'update';
        Singleton::router()->getMockController()->getQuery  = null;

        $this->exception(function () {
            $this->main->run();
        })->isInstanceOf('\BadFunctionCallException');
     }
}
