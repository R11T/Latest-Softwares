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
     * Tests getting ressource link variable
     *
     * @return void
     * @access public
     */
    public function testGetResourceLink()
    {
        $this->string($this->chrome->getResourceLink());
    }

    /**
     * Tests fetching release timestamp
     *
     * @return void
     * @access public
     */
    public function testFetchReleaseTimestamp()
    {
        $this->chrome->setData(file_get_contents($this->file));

        $time = $this->chrome->fetchReleaseTimestamp();

        $this->integer($time)->isIdenticalTo(1415703600);
     }

    /**
     * Tests fetching release major version
     *
     * @return void
     * @access public
     */
    public function testFetchReleaseMajor()
    {
        $this->chrome->setData(file_get_contents($this->file));

        $major = $this->chrome->fetchReleaseMajor();

        $this->integer($major)->isIdenticalTo(38);
    }

    /**
     * Tests fetching release minor version
     *
     * @return void
     * @access public
     */
    public function testFetchReleaseMinor()
    {
        $this->chrome->setData(file_get_contents($this->file));

        $minor = $this->chrome->fetchReleaseMinor();

        $this->integer($minor)->isIdenticalTo(0);
    }

    /**
     * Tests fetching release patch version
     *
     * @return void
     * @access public
     */
    public function testFetchReleasePatch()
    {
        $this->chrome->setData(file_get_contents($this->file));

        $patch = $this->chrome->fetchReleasePatch();

        $this->integer($patch)->isIdenticalTo(2125);
    }

    public function testFetchPlatform()
    {
        $this->chrome->setData(file_get_contents($this->file));

        $platform = $this->chrome->fetchPlatform();

        $this->array($platform)->hasSize(3);
        $this->string($platform[0])->isIdenticalTo('windows');
        $this->string($platform[1])->isIdenticalTo('os x');
        $this->string($platform[2])->isIdenticalTo('linux');
    }

    // le fetcher se démerde comme il veut, on veut juste recuperer un array formaté comme suit :
    /* 
        $data = [
            'name'             => $softwareName,
            'type'             => Singleton::router()->getSoftwareType(),
            'commercialName'   => '',
            'release'          => [
                'major'        => $fetcher->fetchReleaseMajor(),
                'minor'        => $fetcher->fetchReleaseMinor(),
                'patch'        => $fetcher->fetchReleasePatch(),
                'timestamp'    => $fetcher->fetchReleaseTimestamp(),
            ],
        ];
    */
 }
