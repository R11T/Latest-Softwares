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
     * Tests constructor with no method
     *
     * @return void
     * @access public
     */
    public function test__constructWithoutMethod()
    {
        $parameters = [self::SCRIPT_NAME];

        $this->exception(function () use ($parameters) {
            new _Request($parameters, count($parameters));
        })->isInstanceOf('\BadFunctionCallException')
        ->hasMessage('No action specified');
    }

    /**
     * Tests getAction with an action
     *
     * @return void
     * @access public
     */
    public function testGetAction()
    {
        $parameters = [self::SCRIPT_NAME, 'action'];
        $request    = new _Request($parameters, count($parameters));

        $this->string($request->getAction())->isIdenticalTo('action');
    }
}
