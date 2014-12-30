<?php
/**
 * @licence GPL-v2
 */
namespace Tests\Units\App\Libraries;

use \Tests\Units\TestCase;
use \App\Libraries\Collection as _Collection;

/**
 * Unit testing on collection of displayable item
 *
 * @since 0.2
 * @author Romain L.
 * @see \App\Libraries\Collection
 */
class Collection extends TestCase
{
    /**
     * Tests constructing a collection
     *
     * @since 0.2
     * @author Romain L.
     * @see \App\Libraries\Collection
     */
    public function test__construct()
    {
        $this->mockGenerator->orphanize('__construct');
        $item = new \mock\App\Item\Browser;
        $item->getMockController()->display = 'Rose Tyler';

        $collection = new _Collection($item);

        $this->integer($collection->key())->isIdenticalTo(0);
        $this->string($collection->current()->display())->isIdenticalTo('Rose Tyler');
    }

    /**
     * Tests incrementing position
     *
     * @return void
     * @access public
     */
    public function testNext()
    {
        $this->mockGenerator->orphanize('__construct');
        $item1      = new \mock\App\Item\Browser;
        $item1->getMockController()->display = 'Rose Tyler';
        $collection = new _Collection($item1);
        $item2      = new \mock\App\Item\Browser;
        $item2->getMockController()->display = 'Martha Jones';
        $collection->push($item2);

        $collection->next();

        $this->string($collection->current()->display())->isIdenticalTo('Martha Jones');
    }

    /**
     * Test rewinding
     *
     * @return void
     * @access public
     */
    public function testRewind()
    {
        $this->mockGenerator->orphanize('__construct');
        $item1      = new \mock\App\Item\Browser;
        $item1->getMockController()->display = 'Rose Tyler';
        $collection = new _Collection($item1);
        $item2      = new \mock\App\Item\Browser;
        $item2->getMockController()->display = 'Martha Jones';
        $collection->push($item2);
        $collection->next();

        $collection->rewind();

        $this->string($collection->current()->display())->isIdenticalTo('Rose Tyler');
    }

    /**
     * Tests checking item existence
     *
     * @return void
     * @access public
     */
    public function testValid()
    {
        $this->mockGenerator->orphanize('__construct');
        $item       = new \mock\App\Item\Browser;
        $item->getMockController()->display = 'Rose Tyler';
        $collection = new _Collection($item);
        $collection->next();

        $valid = $collection->valid();

        $this->boolean($valid)->isFalse();
    }

    /**
     * Tests poping collection
     *
     * @return void
     * @access public
     */
    public function testPop()
    {
        $this->mockGenerator->orphanize('__construct');
        $item1      = new \mock\App\Item\Browser;
        $item1->getMockController()->display = 'Rose Tyler';
        $collection = new _Collection($item1);
        $item2      = new \mock\App\Item\Browser;
        $item2->getMockController()->display = 'Martha Jones';
        $collection->push($item2);

        $itemX = $collection->pop();

        $this->object($itemX)->isInstanceOf('\App\Item\Browser');
        $this->integer($collection->length())->isIdenticalTo(1);
    }
}
