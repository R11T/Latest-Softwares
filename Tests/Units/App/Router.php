<?php
namespace Tests\Units\App;

require_once dirname(dirname(dirname(__DIR__))) . '/App/Router.php';
require_once dirname(dirname(dirname(__DIR__))) . '/App/Helpers/Displayer.php';

use \atoum;
use \App\Router as _Router;
use \App\Exception\LogicException;

class Router extends \atoum
{
    private $router = null;

    const SCRIPT = 'latest-softwares';

    public function beforeTestMethod()
    {
        $this->router = new _Router();
    }
    /**
     * There is only one function in Router class, used as the front controller. These tests cases look for explore all decision tree nodes
     *
     *
     */
    public function testRoutingWithBadScriptCalled()
    {
        $this->exception(
            function () {
                $this->router->routing(['badScript'], 1);
            }
        )->isInstanceOf(LogicException)
         ->hasMessage('Bad script called');
    }

    public function testRoutingHelp()
    {
        $this->output(
            function () {
                $this->router->routing([self::SCRIPT, '-h'], 2);
            })->contains('Help');
    }

    /*public function testRoutingWithTypeOfSoftware()
    {
        
    }*/
}
