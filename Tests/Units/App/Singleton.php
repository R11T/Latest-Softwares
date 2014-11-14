<?php
/**
 * @licence GPL-v2
 */
namespace Tests\Units\App;

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
        $this->exception(function () {
            _Singleton::router();
        })
        ->isInstanceOf('\LogicException')
        ->hasMessage('router doesn\'t exist');
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
        ->isInstanceOf('\LogicException')
        ->hasMessage('Overwrite router isn\'t allowed');
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
        ->isInstanceOf('\OutOfBoundsException')
        ->hasMessage('Only one value is allowed');
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
        ->isInstanceOf('\DomainException')
        ->hasMessage('router isn\'t an object');
    }
}

