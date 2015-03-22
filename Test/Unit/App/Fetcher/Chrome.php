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
namespace Test\Unit\App\Fetcher;

use \Test\Unit\TestCase;
use \App\Fetcher\Chrome as _Chrome;

/**
 * Unit testing on chrome fetcher
 *
 * @since 0.3
 * @author Romain L.
 * @see \App\Fetcher\Chrome
 */
class Chrome extends TestCase
{
    /**
     * Tested class
     *
     * @var \App\Fetcher\Chrome
     *
     * @access private
     */
    private $chrome;

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
        $this->chrome = new _Chrome;
        $this->file   = DATA_TEST_DIR  . 'chrome';
    }

    /**
     * Tests fetching data when resource file is invalid
     *
     * @return void
     * @access public
     */
    public function testFetchDataWithInexistentResourceFile()
    {
        $chrome = new \mock\App\Fetcher\Chrome;
        $chrome->getMockController()->getResourceLink = '/tmp/nil';

        $this->exception(function () use ($chrome) {
            $chrome->fetchData();
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
        $chrome = new \mock\App\Fetcher\Chrome;
        $chrome->getMockController()->getResourceLink = $this->file;

        $chrome->fetchData();

        $this->string($chrome->getData());
    }

    /**
     * Tests getting resource link variable
     *
     * @return void
     * @access public
     */
    public function testGetResourceLink()
    {
        $this->string($this->chrome->getResourceLink());
    }

    /**
     * Tests fetching release data
     *
     * @return void
     * @access public
     */
    public function testFetchRelease()
    {
        $this->chrome->setData(file_get_contents($this->file));

        $release = $this->chrome->fetchRelease();

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
        $this->chrome->setData(file_get_contents($this->file));

        $platform = $this->chrome->fetchPlatform();

        $this->array($platform)->hasSize(3);
        $this->string($platform[0])->isIdenticalTo('windows');
        $this->string($platform[1])->isIdenticalTo('os x');
        $this->string($platform[2])->isIdenticalTo('linux');
    }
 }
