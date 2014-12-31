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
     * syntax
     *
     * @var string
     *
     * @access private
     */
    private $syntax;

    /**
     * Construct help transport object
     *
     * @param array $data
     *
     * @access public
     */
    public function __construct(array $data)
    {
        $this->syntax = (string) $data['syntax'];
    }

    /**
     * Getter
     *
     * @return string
     * @access public
     */
    public function getSyntax()
    {
        return $this->syntax;
    }

    /**
     * Displays object's content
     *
     * @return string
     * @access public
     */
    public function display()
    {
        return "## Usage\n\n" . $this->getSyntax() . "\n";
        // syntax : 
        // action availables : 
        // software-type availables : 
    }
}

