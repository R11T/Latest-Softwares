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
namespace Test\Unit\App\Library\Io;

use \atoum;
use \App\Library\Io\Request as _Request;

/**
 * Unit testing on the request object
 *
 * @since 0.1
 * @author Romain L.
 * @see \App\Library\Io\Request
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

        $req = new _Request($parameters, count($parameters));

        $this->object($req)->isInstanceOf('\App\Library\Io\Request');
        $this->variable($req->getAction())->isNull();
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
     * Tests getSoftwareType with a software type
     *
     * @return void
     * @access public
     */
    public function testGetSoftwareTypeGiven()
    {
        $params  = [self::SCRIPT_NAME, 'action', 'type'];
        $request = new _Request($params, count($params));

        $this->string($request->getSoftwareType())->isIdenticalTo('type');
    }

    /**
     * Tests getSoftwareType void
     *
     * @return void
     * @access public
     */
    public function testGetQueryWithoutSoftwareType()
    {
        $params  = [self::SCRIPT_NAME, 'action'];
        $request = new _Request($params, count($params));

        $this->variable($request->getSoftwareType())->isNull();
    }

    /**
     * Tests getSoftwareName with a software name
     *
     * @return void
     * @access public
     */
    public function testGetSoftwareNameGiven()
    {
        $params  = [self::SCRIPT_NAME, 'action', 'type', 'name'];
        $request = new _Request($params, count($params));

        $this->string($request->getSoftwareName())->isIdenticalTo('name');
    }

    /**
     * Tests getSoftwareName void
     *
     * @return void
     * @access public
     */
    public function testGetSoftwareNameWithoutSoftwareName()
    {
        $params  = [self::SCRIPT_NAME, 'action', 'type'];
        $request = new _Request($params, count($params));

        $this->variable($request->getSoftwareName())->isNull();
    }
}
