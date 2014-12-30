<?php
/**
 * @licence GPL-v2
 */
namespace Test\Unit\App\Library;

use \Test\Unit\TestCase;
use \App\Singleton as Singleton;
use \App\Library\Factory as _Factory;

/**
 * Unit testing on the main factory
 *
 * @since 0.2
 * @author Romain L.
 * @see \App\Library\Factory
 */
 class Factory extends TestCase
 {
    /**
     * Tests creating factory with unkwown type
     *
     * @return void
     * @access public
     */
    public function testCreateWithFactoryInexistent()
    {
        $factory = new _Factory();

        $this->exception(function () use ($factory) {
            $factory->create('type');
        })->isInstanceOf('\DomainException');
    }

    /**
     * Tests creating factory with known type
     *
     * @return void
     * @access public
     */
    public function testCreateWithFactoryExistent()
    {
        $expectedNS = '\App\Library\Factory\Browser';
        $factory    = new _Factory();

        $softFactory = $factory->create('browser');

        $this->object($softFactory)->isInstanceOf($expectedNS);
    }
 }
