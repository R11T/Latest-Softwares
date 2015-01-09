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
use \App\Item\Release as _Release;

/**
 * Unit testing on release item
 *
 * @since 0.4
 * @author Romain L.
 * @see \App\Item\Release
 */
class Release extends TestCase
{
    /**
     * Tests constructing a release item
     *
     * @return void
     * @access public
     */
    public function test__construct()
    {
        $data = [
            'platform'  => 'Marvin',
            'major'     => 42,
            'minor'     => 161,
            'patch'     => 314,
            'timestamp' => 528491,
        ];

        $release = new _Release($data);

        $this->string($release->getPlatform())->isIdenticalTo('Marvin');
        $this->integer($release->getMajor())->isIdenticalTo(42);
        $this->integer($release->getMinor())->isIdenticalTo(161);
        $this->integer($release->getPatch())->isIdenticalTo(314);
        $this->integer($release->getTimestamp())->isIdenticalTo(528491);
    }

    /**
     * Tests displaying item
     *
     * @return void
     * @access public
     */
    public function testDisplay()
    {
        $data = [
            'platform'  => 'Nebula',
            'major'     => 3,
            'minor'     => 5,
            'patch'     => 7,
            'timestamp' => 11,
        ];
        $release = new _Release($data);

        $display = $release->display();

        $this->boolean(isset($display['Nebula']))->isTrue();
        $this->integer($display['Nebula']['timestamp'])->isIdenticalTo(11);
        $this->integer($display['Nebula']['major'])->isIdenticalTo(3);
        $this->integer($display['Nebula']['minor'])->isIdenticalTo(5);
        $this->integer($display['Nebula']['patch'])->isIdenticalTo(7);
    }
}
