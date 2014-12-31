<?php
/**
 * @licence GPL-v2
 */
namespace Test\Unit\App\Library\Factory;

use \Test\Unit\TestCase;
use \App\Library\Factory\Help as _Help;

/**
 * Unit testing on the help factory
 *
 * @since 0.3
 * @author Romain L.
 * @see \App\Library\Factory\Help
 */
class Help extends TestCase
{
    /**
     * Tests constructing main help
     *
     * @return void
     * @access public
     */
    public function testMain()
    {
        $help = new _Help();

        $main = $help->main();

        $this->object($main)->isInstanceOf('\App\Library\Collection');
    }
}
