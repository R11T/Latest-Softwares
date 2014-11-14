<?php
/**
 * @licence GPL-v2
 */
namespace App;

use \App\Controllers\Main;
use \App\Helpers;

/**
 * Routing service
 * Execute controller/action/parameters sequence understood by Request
 *
 * @since 0.1
 * @author Romain L.
 * @see \Tests\Units\App\Router
 */
class Router
{
    /**
     * Request object, that's it which understand parameters given to script
     *
     * @var Libraries\Io\Request
     * @access private
     */
    private $request;

    /**
     * __construct()
     *
     * @param Libraries\Io\Request $request
     *
     * @access public
     */
    public function __construct(Libraries\Io\Request $request)
    {
        $this->request = $request;
    }

    /**
     * Returns an action controller instanciation
     *
     * @return Controllers\Main
     * @access public
     */
    public function getController()
    {
        $controllerName = $this->request->getAction();
        $controller = new $controllerName();
        return $controller;
    }

    /**
     * Returns action requested
     *
     * @return string
     * @access public
     */
    public function getAction()
    {
        return $this->request->getMethod();
    }

    /**
     * Run the controller with action/method requested
     *
     * @return void
     * @access public
     */
    public function run()
    {
        $controller = $this->getController();
        $action = $this->getAction();
        $controller->$action();
    }
}
