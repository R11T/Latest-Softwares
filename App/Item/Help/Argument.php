<?php
/**
 * @licence GPL-v2
 */
namespace App\Item\Help;

use \App\Library\Interfaces\IDisplayable;

/**
 * Argument Help' Data Transport Object
 *
 * Represents current help at a T time
 *
 * @since 0.3
 * @author Romain L.
 * @see \Test\Unit\App\Item\Help\Argument
 */
class Argument implements IDisplayable
{
    /**
     * Argument
     *
     * @var string
     *
     * @access private
     */
    private $argument;

    /**
     * Construct help transport object
     *
     * @param array $data
     *
     * @access public
     */
    public function __construct(array $data)
    {
        $this->argument = (string) $data[0];
    }

    /**
     * Getter
     *
     * @return string
     * @access public
     */
    public function getArgument()
    {
        return $this->argument;
    }

    /**
     * Displays object's content
     *
     * @return string
     * @access public
     */
    public function display()
    {
        return "Argument : " . $this->getArgument() . "\n";
    }
}


