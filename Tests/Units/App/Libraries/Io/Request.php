<?php
/**
 * @licence GPL-v2
 */
namespace Tests\Units\App\Libraries\Io;

use \atoum;
use \App\Libraries\Io\Request as _Request;

/**
 * Unit testing on the request object
 *
 * @since 0.1
 * @author Romain L.
 * @see \App\Libraries\Io\Request
 */
class Request extends \atoum
{
    /**
     * Script name called, software's entry point
     *
     * @var string
     * @access public
     */
    const SCRIPT_NAME = 'latest-softwares';

    /**
     * Tests __construct when script called without args
     *
     * @return void
     * @access public
     */
    public function test__constructWithoutArgs()
    {
        $parameters = [self::SCRIPT_NAME];

        $this->exception(function () use ($parameters) {
            new _Request($parameters, count($parameters));
        })->isInstanceOf('\BadFunctionCallException')
        ->hasMessage('None args specified');
    }
    
    /**
     * Tests constructor with no method
     *
     * @return void
     * @access public
     */
    public function test__constructWithoutMethod()
    {
        $parameters = [self::SCRIPT_NAME, 'action'];

        $this->exception(function () use ($parameters) {
            new _Request($parameters, count($parameters));
        })->isInstanceOf('\BadFunctionCallException')
        ->hasMessage('No method specified');
    }

    /**
     * Tests getAction with action
     *
     * @return void
     * @access public
     */
    public function testGetAction()
    {
        $parameters = [self::SCRIPT_NAME, 'action', 'method'];
        $request    = new _Request($parameters, count($parameters));

        $this->string($request->getAction())->isIdenticalTo('action');
    }

    /**
     * Tests getMethod with method
     *
     * @return void
     * @access public
     */
    public function testGetMethod()
    {
        $parameters = [self::SCRIPT_NAME, 'action', 'method'];
        $request    = new _Request($parameters, count($parameters));

        $this->string($request->getMethod())->isIdenticalTo('method');
    }
}
