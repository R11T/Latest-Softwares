<?php
/**
 * @licence GPL-v2
 */
namespace App\Item\Help;

use \App\Library\Interfaces\IDisplayable;

/**
 * Usage Help' Data Transport Object
 *
 * Represents current help at a T time
 *
 * @since 0.3
 * @author Romain L.
 * @see \Test\Unit\App\Item\Help\Usage
 */
class Usage implements IDisplayable
{
    /**
     * usage
     *
     * @var string
     *
     * @access private
     */
    private $usage;

    /**
     * Construct help transport object
     *
     * @param array $data
     *
     * @access public
     */
    public function __construct(array $data)
    {
        $this->usage = (string) $data[0];
    }

    /**
     * Getter
     *
     * @return string
     * @access public
     */
    public function getUsage()
    {
        return $this->usage;
    }

    /**
     * Displays object's content
     *
     * @return string
     * @access public
     */
    public function display()
    {
        return "Usage : " . $this->getUsage() . "\n";
    }
}

