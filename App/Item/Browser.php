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

use \App\Library\Interfaces;

/**
 * Browser Data Transport Object
 *
 * Represents data at a T time
 *
 * @since 0.2
 * @author Romain L.
 * @see \Test\Unit\App\Item\Browser
 */
class Browser implements Interfaces\IDisplayable, Interfaces\ISoftwareGetable
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
     * Textual software type
     *
     * @var string
     *
     * @access private
     */
    private $type;

    /**
     * Timestamp of the last update
     *
     * @var int
     *
     * @access private
     */
    private $lastUpdate;

    private $release;

    /**
     * Construct data transport object
     *
     * @param array $data
     *
     * @access public
     */
    public function __construct(array $data)
    {
        $this->name           = (string) $data['name'];
        $this->type           = (string) $data['type'];
        $this->lastUpdate     = (int)    $data['lastUpdate'];
        $this->commercialName = (string) $data['commercialName'];
        $this->release        =          $data['release'];
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
     * @return string
     * @access public
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Getter
     *
     * @return int
     * @access public
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    public function getCommercialName()
    {
        return $this->commercialName;
    }

    public function getRelease()
    {
        return $this->release;
    }

    /**
     * Displays object's content
     *
     * @return string
     * @access public
     */
    public function display()
    {
        $data = [
            $this->getName() => [
                'lastUpdate'     => $this->getLastUpdate(),
                'commercialName' => $this->getCommercialName(),
                'release'        => $this->getRelease()->display(),
            ],
        ];
        return print_r($data, true);
    }
}
