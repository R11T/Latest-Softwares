<?php
/**
 * @licence GPL-v2
 */
namespace Test\Unit\App\Item\Help;

use \Test\Unit\TestCase;
use \App\Item\Help\Usage as _Usage;

/**
 * Unit testing on help usage
 *
 * @since 0.3
 * @author Romain L.
 * @see App\Item\Help\Usage
 */
class Usage extends TestCase
{
    /**
     * Tests constructing an usage item
     *
     * @return void
     * @access public
     */
    public function test__construct()
    {
        $data = ['Deep Thought'];

        $usage = new _Usage($data);

        $this->string($usage->getUsage())->isIdenticalTo('Deep Thought');
    }

    /**
     * Tests displaying item's content
     *
     * @return void
     * @access public
     */
    public function testDisplay()
    {
        $data  = ['Zaphod'];
        $usage = new _Usage($data);
        
        $display = $usage->display();

        $this->string($display)->contains('Zaphod');
    }
}

