<?php
/**
 * @licence GPL-v2
 */
namespace App\Item\Help;

use \App\Library\Interfaces\IDisplayable;

/**
 * Help' Data Transport Object
 *
 * Represents current help at a T time
 *
 * @since 0.3
 * @author Romain L.
 * @see \Test\Unit\App\Item\Help\Introduction
 */
class Introduction implements IDisplayable
{
    /**
     * Latest software's description
     *
     * @var string
     *
     * @access private
     */
    private $description;

    /**
     * Latest software's author(s ?)
     *
     * @var string
     *
     * @access private
     */
    private $author;

    /**
     * Latest software's link
     *
     * @var string
     *
     * @access private
     */
    private $link;

    /**
     * Construct help transport object
     *
     * @param array $data
     *
     * @access public
     */
    public function __construct(array $data)
    {
        $this->description = (string) $data['description'];
        $this->author      = (string) $data['author'];
        $this->link        = (string) $data['link'];
    }

    /**
     * Getter
     *
     * @return string
     * @access public
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Getter
     *
     * @return string
     * @access public
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Getter
     *
     * @return string
     * @access public
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Displays object's content
     *
     * @return string
     * @access public
     */
    public function display()
    {
        $display = "## Latest Softwares\n\n" . $this->getDescription() . "\n";
        $display .= "Made with love by " . $this->getAuthor() . "\n";
        $display .= 'Source code : ' . $this->getLink();
        return $display . "\n";
    }
}
