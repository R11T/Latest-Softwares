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
     * Tests constructor with no action
     *
     * @return void
     * @access public
     */
    public function test__constructWithoutAction()
    {
        $parameters = [self::SCRIPT_NAME];

        $this->exception(function () use ($parameters) {
            new _Request($parameters, count($parameters));
        })->isInstanceOf('\BadFunctionCallException');
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

    /**
     * Tests getQuery with a query
     *
     * @return void
     * @access public
     */
     public function testGetQueryWithQuery()
     {
        $params  = [self::SCRIPT_NAME, 'action', 'query'];
        $request = new _Request($params, count($params));

        $this->string($request->getQuery())->isIdenticalTo('query');
     }

    /**
     * Tests getQuery without a query
     *
     * @return void
     * @access public
     */
     public function testGetQueryWithoutQuery()
     {
        $params  = [self::SCRIPT_NAME, 'action'];
        $request = new _Request($params, count($params));

        $this->variable($request->getQuery())->isNull();
     }
}
