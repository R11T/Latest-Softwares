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
     * Tested class
     *
     * @var \App\Library\Factory
     *
     * @access private
     */
    private $factory;

    /**
     * Setting routine
     *
     * @return void
     * @access public
     */
    public function beforeTestMethod()
    {
        $namespaces    = new \mock\App\Library\Namespaces();
        Singleton::namespaces($namespaces);
        $this->factory = new _Factory();
    }

    /**
     * Tests creating factory with inexistent dao
     *
     * @return void
     * @access public
     */
    public function testCreateWithDaoInexistent()
    {
        Singleton::namespaces()->getMockController()->getDaoName = 'notADao';

        $this->exception(function () {
            $this->factory->create('type');
        })->isInstanceOf('\DomainException');
    }

    /**
     * Tests creating factory with existent dao
     *
     * @return void
     * @access public
     */
    public function testCreateWithDaoExistent()
    {
        $this->factory->create('browser');

        $this->object(Singleton::dao())->isInstanceOf('\App\Library\Dao\Browser');
    }

    /**
     * Tests creating factory with inexistent type
     *
     * @return void
     * @access public
     */
    public function testCreateWithTypeInexistent()
    {
        Singleton::namespaces()->getMockController()->getFactoryName = 'notAFactory';

        $this->exception(function () {
            $this->factory->create('type');
        })->isInstanceOf('\DomainException');
    }

    /**
     * Tests creating factory with existent type
     *
     * @return void
     * @access public
     */
    public function testCreateWithTypeExistent()
    {
        $softFactory = $this->factory->create('browser');

        $this->object($softFactory)->isInstanceOf('\App\Library\Factory\Browser');
    }
 }
