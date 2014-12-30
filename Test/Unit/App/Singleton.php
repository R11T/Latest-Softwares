<?php
/**
 * @licence GPL-v2
 */
namespace Test\Unit\App;

use \atoum;
use \App\Singleton as _Singleton;
use \App\Main;

/**
 * Unit testing on the singleton collector
 *
 * @since 0.1
 * @author Romain L.
 * @see App\Singleton
 */
class Singleton extends \atoum
{
    /**
     * Tests getting non existant variable
     *
     * @return void
     * @access public
     */
    public function testGetVariableNonExistent()
    {
        $this->variable(_Singleton::router())->isNull();
    }

    /**
     * Tests getting existent variable / setting variable
     *
     * @return void
     * @access public
     */
    public function testGetVariableExistent()
    {
        _Singleton::router((new \StdClass));

        $this->object(_Singleton::router())->isInstanceOf('\StdClass');
    }

    /**
     * Tests overwriting pre-existent variable
     *
     * @return void
     * @access public
     */
    public function testOverwritingVariable()
    {
        _Singleton::router((new \StdClass));

        $this->exception(function () {
            _Singleton::router((new \StdClass));
        })
        ->isInstanceOf('\LogicException');
    }

    /**
     * Tests setting multiple value
     *
     * @return void
     * @access public
     */
    public function testSettingMultipleValue()
    {
        $this->exception(function () {
            _Singleton::router((new \StdClass), (new \StdClass));
        })
        ->isInstanceOf('\OutOfBoundsException');
    }

    /**
     * Tests setting not an object
     *
     * @return void
     * @access public
     */
    public function testSettingNotAnObject()
    {
        $this->exception(function () {
            _Singleton::router('I love apple pie');
        })
        ->isInstanceOf('\DomainException');
    }
}

