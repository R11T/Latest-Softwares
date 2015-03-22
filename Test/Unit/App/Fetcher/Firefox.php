<?php
namespace Test\Unit\App\Fetcher;

use \Test\Unit\TestCase;
use \App\Fetcher\Firefox as _Firefox;

/**
 * Unit testing on firefox fetcher
 *
 * @since 0.6
 * @author Romain L.
 * @see \App\Fetcher\Firefox
 */
class Firefox extends TestCase
{
    /**
     * Tested class
     *
     * @var \App\Fetcher\Firefox
     *
     * @access private
     */
    private $firefox;

    /**
     * Testing data file path
     *
     * @var string
     *
     * @access private
     */
    private $file;

    /**
     * Setting routine
     *
     * @return void
     * @access public
     */
    public function beforeTestMethod()
    {
        $this->firefox = new _Firefox;
        $this->file    = DATA_TEST_DIR . 'firefox';
    }

    /**
     * Tests fetching data when resource file is invalid
     *
     * @return void
     * @access public
     */
    public function testFetchDataWithInexistentResourceFile()
    {
        $firefox = new \mock\App\Fetcher\Firefox;
        $firefox->getMockController()->getResourceLink = '/tmp/nil';

        $this->exception(function () use ($firefox) {
            $firefox->fetchData();
        })->isInstanceOf('\Exception');
    }

    /**
     * Tests fetching data when resource file is valid
     *
     * @return void
     * @access public
     */
    public function testFetchDataWithExistentResourceFile()
    {
        $firefox = new \mock\App\Fetcher\Firefox;
        $firefox->getMockController()->getResourceLink = $this->file;

        $firefox->fetchData();

        $this->string($firefox->getData());
    }

    /**
     * Tests getting resource link variable
     *
     * @return void
     * @access public
     */
    public function testResourceLink()
    {
        $this->string($this->firefox->getResourceLink());
    }

    public function testFetchRelease()
    {
        $this->firefox->setData(file_get_contents($this->file));

        $release = $this->firefox->fetchRelease();

        $this->object($release)->isInstanceOf('\App\Library\Collection\Release');
        $this->integer($release->length())->isIdenticalTo(3);
    }

    /**
     * Test fetching platform availability
     *
     * @return void
     * @access public
     */
    public function testFetchPlatform()
    {
        $platform = $this->firefox->fetchPlatform();

        $this->array($platform)->hasSize(3);
        $this->string($platform[0])->isIdenticalTo('windows');
        $this->string($platform[1])->isIdenticalTo('os x');
        $this->string($platform[2])->isIdenticalTo('linux');
    }
}
