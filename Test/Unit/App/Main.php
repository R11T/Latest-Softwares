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
        $dao         = new \mock\App\Library\Dao\Type;
        $dao->getMockController()->getAllNames    = [
            ['type_name' => 'browser'],
        ];
        Singleton::daoType($dao);
        $help = new \mock\App\Library\Factory\Help;
        Singleton::help($help);
        $factory = new \mock\App\Library\Factory\Browser;
        Singleton::factory($factory);
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

        $this->when(function () {
            $this->main->run();
        })->mock(Singleton::help())->call('main')->once();
     }

    /**
     * Tests getting without software type
     *
     * @return void
     * @access public
     */
    public function testRunWithSoftwareTypeNull()
    {
        Singleton::router()->getMockController()->getAction       = 'get';
        Singleton::router()->getMockController()->getSoftwareType = null;
        Singleton::help()->getMockController()->badSoftwareName   = null;

        $this->when(function () {
            $this->main->run();
        })->mock(Singleton::help())->call('badSoftwareType')->once();
    }

    /**
     * Tests getting when we are requesting all softwares of a given type
     *
     * @return void
     * @access public
     */
    public function testGetWithSoftwareNameIsAll()
    {
        Singleton::router()->getMockController()->getAction       = 'get';
        Singleton::router()->getMockController()->getSoftwareType = 'browser';
        Singleton::router()->getMockController()->getSoftwareName = 'all';
        Singleton::factory()->getMockController()->getAll         = 'test all';

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
        Singleton::router()->getMockController()->getAction       = 'get';
        Singleton::router()->getMockController()->getSoftwareType = 'browser';
        Singleton::router()->getMockController()->getSoftwareName = 'chrome';
        Singleton::factory()->getMockController()->getByName      = 'this is chrome';
        Singleton::factory()->getMockController()->getAllNames    = ['chrome', 'firefox'];

        $getAll = $this->main->run();

        $this->string($getAll)->isIdenticalTo('this is chrome');
    }

    /**
     * Tests getting when software name is unknown
     *
     * @return void
     * @access public
     */
    public function testGetWithSoftwareNameUnkwown()
    {
        Singleton::router()->getMockController()->getAction       = 'get';
        Singleton::router()->getMockController()->getSoftwareType = 'browser';
        Singleton::router()->getMockController()->getSoftwareName = '?';
        Singleton::factory()->getMockController()->getAllNames    = ['This is Spartaaa', 'Xerxes'];
        Singleton::help()->getMockController()->badSoftwareName   = null;

        $this->when(function () {
            $this->main->run();
        })->mock(Singleton::help())->call('badSoftwareName')->once();
    }

    /**
     * Tests updating without software type
     *
     * @return void
     * @access public
     */
    public function testUpdateWithSoftwareTypeNull()
    {
        Singleton::router()->getMockController()->getAction       = 'update';
        Singleton::router()->getMockController()->getSoftwareType = null;
        Singleton::help()->getMockController()->badSoftwareName   = null;

        $this->when(function () {
            $this->main->run();
        })->mock(Singleton::help())->call('badSoftwareType')->once();
    }

    /**
     * Tests updating with "all" as software name
     *
     *
     */
    /*public function testUpdateWithSoftwareNameIsAll()
    {
        Singleton::router()->getMockController()->getAction       = 'update';
        Singleton::router()->getMockController()->getSoftwareType = 'browser';
        Singleton::router()->getMockController()->getSoftwareName = 'all';
        Singleton::factory()->getMockController()->updateAll      = 'test all';

        $updateAll = $this->main->run();

        $this->string($updateAll)->isIdenticalTo('test all');
    }

    /**
     * Tests updating when software name is given
     *
     * @return void
     * @access public
     */
    public function testUpdateWithSoftwareNameGiven()
    {
        Singleton::router()->getMockController()->getAction       = 'update';
        Singleton::router()->getMockController()->getSoftwareType = 'browser';
        Singleton::router()->getMockController()->getSoftwareName = 'chrome';
        Singleton::factory()->getMockController()->updateByName   = 'this is chrome';
        Singleton::factory()->getMockController()->getAllNames    = ['chrome', 'firefox'];

        $this->when(function () {
            $this->main->run();
        })->mock(Singleton::factory())->call('updateByName')->once();
    }

    /**
     * Tests updating when software name is unknown
     *
     * @return void
     * @access public
     */
    public function testUpdateWithSoftwareNameUnknown()
    {
        Singleton::router()->getMockController()->getAction       = 'update';
        Singleton::router()->getMockController()->getSoftwareType = 'browser';
        Singleton::router()->getMockController()->getSoftwareName = '?';
        Singleton::factory()->getMockController()->getAllNames    = ['This is Spartaaa', 'Xerxes'];
        Singleton::help()->getMockController()->badSoftwareName   = null;

        $this->when(function () {
            $this->main->run();
        })->mock(Singleton::help())->call('badSoftwareName')->once();
    }
}
