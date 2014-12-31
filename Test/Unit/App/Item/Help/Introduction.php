<?php
/**
 * @licence GPL-v2
 */
namespace Test\Unit\App\Item\Help;

use \Test\Unit\TestCase;
use \App\Item\Help\Introduction as _Introduction;

/**
 * Unit testing on help introduction item
 *
 * @since 0.3
 * @author Romain L.
 * @see App\Item\Help\Introduction
 */
class Introduction extends TestCase
{
    /**
     * Tests constructing an introduction item
     *
     * @return void
     * @access public
     */
    public function test__construct()
    {
        $data = [
            'description' => 'It\'s me, Mario !',
            'author'      => 'Mario',
            'link'        => 'Not link, Mario',
        ];

        $intro = new _Introduction($data);

        $this->string($intro->getDescription())->isIdenticalTo('It\'s me, Mario !');
        $this->string($intro->getAuthor())->isIdenticalTo('Mario');
        $this->string($intro->getLink())->isIdenticalTo('Not link, Mario');
    }

    /**
     * Tests displaying item's content
     *
     * @return void
     * @access public
     */
    public function testDisplay()
    {
        $data = [
            'description' => 'Banana ?',
            'author'      => 'Minions',
            'link'        => 'bananaaaaa.mn',
        ];
        $intro = new _Introduction($data);
        
        $display = $intro->display();

        $this->string($display)->contains('Banana ?');
        $this->string($display)->contains('Minions');
        $this->string($display)->contains('bananaaaaa.mn');
    }
}
