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
     * Tests if getAction returns action given to request
     *
     * @return void
     * @access public
     */
    public function testGetAction()
    {
        $parameters = [self::SCRIPT_NAME, 'get'];
        $request    = new \mock\App\Libraries\Io\Request($parameters, count($parameters));
        $router     = new _Router($request);

        $this->string($router->getAction())->isIdenticalTo('get');
    }
}
