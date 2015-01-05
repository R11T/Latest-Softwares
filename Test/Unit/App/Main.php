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

use \Test\Unit\TestCase;
use \App\Singleton as Singleton;
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
	    $this->main  = new _Main();
	    $this->mockGenerator()->orphanize('__construct');
	    $router      = new \mock\App\Router;
	    $response    = new \mock\App\Library\Io\Response;
	    Singleton::router($router);
	    Singleton::response($response);
        $mainFactory = new \mock\App\Libraries\Factory;
        Singleton::mainFactory($mainFactory);
        $dao         = new \mock\App\Library\Dao\Type;
        $dao->getMockController()->getAllNames    = [
            ['type_name' => 'browser'],
        ];
        Singleton::daoType($dao);
    }

	/**
	 * Tests running help
	 *
	 * @return void
	 * @access public
	 */
	public function testRunHelp()
	{
        Singleton::router()->getMockController()->getAction       = 'help';
        Singleton::router()->getMockController()->getSoftwareType = null;

        $run = $this->main->run();

        $this->object($run)->isInstanceOf('\App\Library\Collection');
    }

    /**
     * Tests running non callable action
     *
     * @return void
     * @access public
     */
     public function testRunNonCallable()
     {
        Singleton::router()->getMockController()->getAction       = 'test';
        Singleton::router()->getMockController()->getSoftwareType = null;

        $run  = $this->main->run();

        $this->object($run)->isInstanceOf('\App\Library\Collection');
     }

    /**
     * Tests running a callable action without software type
     *
     * @return void
     * @access public
     */
    public function testRunWithSoftwareTypeNull()
    {
        Singleton::router()->getMockController()->getAction       = 'get';
        Singleton::router()->getMockController()->getSoftwareType = null;

        $run = $this->main->run();

        $this->object($run)->isInstanceOf('\App\Library\Collection');
        $this->object($run->pop())->isInstanceOf('\App\Item\Help\Usage');
    }

    /**
     * Tests getting when we are requesting all softwares of a given type
     *
     * @return void
     * @access public
     */
    public function testGetWithSoftwareNameIsAll()
    {
        Singleton::router()->getMockController()->getAction = 'get';
        Singleton::router()->getMockController()->getSoftwareType = 'browser';
        Singleton::router()->getMockController()->getSoftwareName = 'all';
        $factory = new \mock\App\Library\Factory\Browser;
        Singleton::mainFactory()->getMockController()->create = $factory;
        $factory->getMockController()->getAll = 'test all';

        $getAll = $this->main->run();

        $this->string($getAll)->isIdenticalTo('test all');
    }

    /**
     * Tests getting when software name is given
     *
     * @return void
     * @access public
     */
    public function testGetWithSoftwareNameGiven()
    {
        Singleton::router()->getMockController()->getAction = 'get';
        Singleton::router()->getMockController()->getSoftwareType = 'browser';
        Singleton::router()->getMockController()->getSoftwareName = 'chrome';
        $factory = new \mock\App\Library\Factory\Browser;
        Singleton::mainFactory()->getMockController()->create = $factory;
        $factory->getMockController()->getByName = 'this is chrome';
        $factory->getMockController()->getAllNames = ['chrome', 'firefox'];

        $getAll = $this->main->run();

        $this->string($getAll)->isIdenticalTo('this is chrome');
    }

    /**
     * Tests getting when software name is unknown
     *
     * @return void
     * @access public
     */
    public function testGetWithUnkwown()
    {
        Singleton::router()->getMockController()->getAction       = 'get';
        Singleton::router()->getMockController()->getSoftwareType = 'browser';
        Singleton::router()->getMockController()->getSoftwareName = '?';
        $factory = new \mock\App\Library\Factory\Browser;
        Singleton::mainFactory()->getMockController()->create = $factory;
        $factory->getMockController()->getAllNames = ['This is Spartaaa', 'Xerxes'];

        $getAll = $this->main->run();

        $this->object($getAll)->isInstanceOf('\App\Library\Collection');
        $this->object($getAll->pop())->isInstanceOf('\App\Item\Help\Usage');
    }
}
