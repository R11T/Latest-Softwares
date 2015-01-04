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
namespace App\Item;

use \App\Library\Interfaces\IDisplayable;

/**
 * Browser's Data Transport Object
 *
 * Represents data at a T time
 *
 * @since 0.2
 * @author Romain L.
 * @see \Test\Unit\App\Item\Browser
 */
class Browser implements IDisplayable
{
    /**
     * Browser's name
     *
     * @var string
     *
     * @access private
     */
    private $name;

    /**
     * Software type
     *
     * @var int
     *
     * @access private
     */
    private $type;

    /**
     * Construct data transport object
     *
     * @param array $data
     *
     * @access public
     */
    public function __construct(array $data)
    {
        $this->name = (string) $data['software_name'];
        $this->type = (int) $data['type_id'];
    }

    /**
     * Getter
     *
     * @return string
     * @access public
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Getter
     *
     * @return int
     * @access public
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Displays object's content
     *
     * @return string
     * @access public
     */
    public function display()
    {
        return $this->getName() . ' is a software of type ' . $this->getType();
    }
}
