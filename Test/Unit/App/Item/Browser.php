<?php
/**
 * @licence GPL-v2
 */
namespace Test\Unit\App\Item;

use \Test\Unit\TestCase;
use \App\Singleton;
use \App\Item\Browser as _Browser;

/**
 * Unit testing on browser's model
 *
 * @since 0.2
 * @author Romain L.
 * @see \App\Item\Browser
 */
class Browser extends TestCase
{
    /**
     * Tests constructing of a browser item
     *
     * @return void
     * @access public
     */
    public function test__construct()
    {
        $data = ['software_name' => 'Spartan', 'type_id' => 117];

        $browser = new _Browser($data);

        $this->string($browser->getName())->isIdenticalTo('Spartan');
        $this->integer($browser->getType())->isIdenticalTo(117);
    }

    /**
     * Tests displaying item's content
     *
     * @return void
     * @access public
     */
    public function testDisplay()
    {
       $data = ['software_name' => 'Elite', 'type_id' => '666'];
       $browser = new _Browser($data);

       $display = $browser->display();

       $this->string($display)->isIdenticalTo('Elite is a software of type 666');
    }
}
