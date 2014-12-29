<?php
/**
 * @licence GPL-v2
 */
namespace App\Libraries;

/**
 * 
 *
 *
 */
class Collection implements \Iterator
{
    public function __construct(\Displayable $item)
    {
    }

    public function current()
    {
        return ($this->array[$this->position])->display();
    }

    public function key()
    {
    }

    function next()
    {
    }

    public function rewind()
    {
    }

    public function valid()
    {
    }

    public function push()
    {
    }

    public function pop()
    {
    }
}
