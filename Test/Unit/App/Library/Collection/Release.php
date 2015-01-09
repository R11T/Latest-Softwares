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
 namespace Test\Unit\App\Library\Collection;

 use \Test\Unit\TestCase;
 use \App\Library\Collection\Release as _Release;

/**
 * Unit testing on collection of releases
 *
 * @since 0.4
 * @author Romain L.
 * @see \App\Library\Collection\Release
 */
class Release extends TestCase
{
    /**
     * Tests displaying release collection
     *
     * @return void
     * @access public
     */
    public function testDisplay()
    {
        $this->mockGenerator->orphanize('__construct');
        $item1 = new \mock\App\Item\Release;
        $data1 = ['Foundation' => [
            'timestamp' => 0,
            'major'     => 553,
            'minor'     => 29335,
            'patch'     => 4,
        ]];
        $data2 = ['Dune' => [
            'timestamp' => 4,
            'major'     => 411,
            'minor'     => 72717,
            'patch'     => 7,
        ]];
        $item1->getMockController()->display = $data1;
        $item2 = new \mock\App\Item\Release;
        $item2->getMockController()->display = $data2;
        $collection = new _Release($item1);
        $collection->push($item2);

        $display = $collection->display();

        $this->array($display)->hasSize(2);
        $this->boolean(isset($display['Foundation']))->isTrue();
        $this->integer($display['Foundation']['timestamp'])->isIdenticalTo(0);
        $this->integer($display['Foundation']['major'])->isIdenticalTo(553);
        $this->integer($display['Foundation']['minor'])->isIdenticalTo(29335);
        $this->integer($display['Foundation']['patch'])->isIdenticalTo(4);
        $this->boolean(isset($display['Dune']))->isTrue();
        $this->integer($display['Dune']['timestamp'])->isIdenticalTo(4);
        $this->integer($display['Dune']['major'])->isIdenticalTo(411);
        $this->integer($display['Dune']['minor'])->isIdenticalTo(72717);
        $this->integer($display['Dune']['patch'])->isIdenticalTo(7);
    }
}
