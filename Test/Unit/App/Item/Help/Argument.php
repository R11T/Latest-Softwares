<?php
/**
 * @licence GPL-v2
 */
namespace Test\Unit\App\Item\Help;

use \Test\Unit\TestCase;
use \App\Item\Help\Argument as _Argument;

/**
 * Unit testing on help argument
 *
 * @since 0.3
 * @author Romain L.
 * @see App\Item\Help\Argument
 */
class Argument extends TestCase
{
    /**
     * Tests constructing an argument item
     *
     * @return void
     * @access public
     */
    public function test__construct()
    {
        $data = ['Arrakis'];

        $Argument = new _Argument($data);

        $this->string($Argument->getArgument())->isIdenticalTo('Arrakis');
    }

    /**
     * Tests displaying item's content
     *
     * @return void
     * @access public
     */
    public function testDisplay()
    {
        $data     = ['Muad\'Dib'];
        $Argument = new _Argument($data);
        
        $display = $Argument->display();

        $this->string($display)->contains('Muad\'Dib');
    }
}


