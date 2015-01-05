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
namespace App\Library;

use \App\Library\Interfaces;

/**
 * Collection of displayable item
 *
 * @since 0.2
 * @author Romain L.
 * @see \Test\Unit\App\Library\Collection
 */
class Collection implements \Iterator, Interfaces\IStackable, Interfaces\IMeasurable // implements JsonSerializable too
{
    /**
     * Collection of items
     *
     * @var array
     *
     * @access private
     */
    private $items = [];

    /**
     * Offset of the current element
     *
     * @var int
     *
     * @access private
     */
    private $position;

    /**
     * Construct a new Collection, adding a new item
     *
     * @param \ISoftwareItemDisplayable $item
     *
     * @access public
     */
    public function __construct(Interfaces\IDisplayable $item)
    {
        $this->push($item);
        $this->position = 0;
    }

    /**
     * Add an element on the top of the stack
     *
     * @param Interfaces\IDisplayable $item
     *
     * @return void
     * @access public
     */
    public function push(Interfaces\IDisplayable $item)
    {
        $this->items[] = $item;
    }

    /**
     * Get current element
     *
     * @return string
     * @access public
     */
    public function current()
    {
        return $this->items[$this->position];
    }

    /**
     * Get current key
     *
     * @return int
     * @access public
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Increments position
     *
     * @return void
     * @access public
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * Rewinds position
     *
     * @return void
     * @access public
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * Checks if an item exists at the current position
     *
     * @return bool
     * @access public
     */
    public function valid()
    {
        return isset($this->items[$this->position]);
    }

    /**
     * Extract lastest added item and returns it
     *
     * @return Interfaces\IDisplayable|null if $items is empty
     * @access public
     */
    public function pop()
    {
        return array_pop($this->items);
    }

    /**
     * Returns number of item in items
     *
     * @return int
     * @access public
     */
    public function length()
    {
        return count($this->items);
    }
}
