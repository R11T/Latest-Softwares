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
        $data = [
            'software_name'        => 'Spartan',
            'type_name'            => 'Human',
            'software_last_update' => '117',
        ];

        $browser = new _Browser($data);

        $this->string($browser->getName())->isIdenticalTo('Spartan');
        $this->string($browser->getType())->isIdenticalTo('Human');
        $this->integer($browser->getLastUpdate())->isIdenticalTo(117);
    }

    /**
     * Tests displaying item's content
     *
     * @return void
     * @access public
     */
    public function testDisplay()
    {
       $data    = ['software_name' => 'Elite', 'type_name' => 'Saurian', 'software_last_update' => 223];
       $browser = new _Browser($data);

       $display = $browser->display();

       $this->string($display)->isIdenticalTo('Elite is a software of type Saurian last updated on 223');
    }
}
