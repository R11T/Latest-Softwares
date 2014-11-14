<?php
/**
 * @licence GPL-v2
 */
namespace Tests\Units\App;

use \atoum;
use \App\Router as _Router;

/**
 * Unit testing on the routing service
 *
 * @since 0.1
 * @author Romain L.
 * @see \App\Router
 */
class Router extends \atoum
{
    /**
     * Script name called, software's entry point
     *
     * @var string
     * @access public
     */
    const SCRIPT_NAME = 'latest-softwares';

    /**
     * Tests if getController instanciates action parameter
     *
     * @return void
     * @access public
     */
    public function testGetController()
    {
        $parameters = [self::SCRIPT_NAME, 'mock\\Main', 'get'];
        $request    = new \mock\App\Libraries\Io\Request($parameters, count($parameters));
        $router     = new _Router($request);

        $this->object($router->getController())->isInstanceOf('mock\\Main');
    }

    /**
     * Tests if getAction returns method given to request
     *
     * @return void
     * @access public
     */
    public function testGetAction()
    {
        $parameters = [self::SCRIPT_NAME, 'mock\\Main', 'get'];
        $request    = new \mock\App\Libraries\Io\Request($parameters, count($parameters));
        $router     = new _Router($request);

        $this->string($router->getAction())->isIdenticalTo('get');
    }

    /**
     * Tests if controller triggers action
     *
     * @return void
     * @access public
     */
    public function testRun()
    {
        $controller = new \mock\App\Controllers\Main;
        $action     = 'get';
        $request    = new \mock\App\Libraries\Io\Request([], 3);
        $router     = new \mock\App\Router($request);
        $router->getMockController()->getController = $controller;
        $router->getMockController()->getAction = $action;
        $controller->getMockController()->$action = true;

        $this->when(
            $router->run()
        )->mock($controller)->call($action)->once();
    }
}
