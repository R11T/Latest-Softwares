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
namespace Test\Unit\App;

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
        $request    = new \mock\App\Library\Io\Request($parameters, count($parameters));
        $router     = new _Router($request);

        $this->string($router->getAction())->isIdenticalTo('get');
    }

    /**
     * Tests if getSoftwareType returns query given to request
     *
     * @return void
     * @access public
     */
     public function testGetSoftwareType()
     {
        $parameters = [self::SCRIPT_NAME, 'get', 'type'];
        $request    = new \mock\App\Library\Io\Request($parameters, count($parameters));
        $router     = new _Router($request);

        $this->string($router->getSoftwareType())->isIdenticalTo('type');
     }

    /**
     * Tests if getSoftwareName returns query given to request
     *
     * @return void
     * @access public
     */
    public function testGetSoftwareName()
    {
        $parameters = [self::SCRIPT_NAME, 'get', 'type', 'name'];
        $request    = new \mock\App\Library\Io\Request($parameters, count($parameters));
        $router     = new _Router($request);

        $this->string($router->getSoftwareName())->isIdenticalTo('name');
    }
}
