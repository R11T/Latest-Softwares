<?php
/**
 * @licence GPL-v2
 */
namespace Tests\Units\App\Libraries;

use \Tests\Units\TestCase;
use \App\Singleton as Singleton;
use \App\Libraries\Factory as _Factory;

/**
 * Unit testing on the main factory
 *
 * @since 0.2
 * @author Romain L.
 * @see \App\Libraries\Factory
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
        $expectedNS = '\App\Libraries\Factories\Browser';
        $factory    = new _Factory();

        $softFactory = $factory->create('browser');

        $this->object($softFactory)->isInstanceOf($expectedNS);
    }
 }
