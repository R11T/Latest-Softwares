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
     * Availables actions
     *
     * @var string
     *
     * @access private
     */
    private $action;

    /**
     * Availables software type
     *
     * @var string
     *
     * @access private
     */
    private $softwareType;

    /**
     * Availables software name
     *
     * @var string
     *
     * @acces private
     */
    private $softwareName;

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
        $this->action = isset($data['action']) ? (string) $data['action'] : null;
        $this->softwareType = isset($data['softwareType']) ? (string) $data['softwareType'] : null;
        $this->softwareName = isset($data['softwareName']) ? (string) $data['softwareName'] : null;
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
     * Getter
     *
     * @return string
     * @access public
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Getter
     *
     * @return string
     * @access public
     */
    public function getSoftwareType()
    {
        return $this->softwareType;
    }

    /**
     * Getter
     *
     * @return string
     * @access public
     */
    public function getSoftwareName()
    {
        return $this->softwareName;
    }

    /**
     * Displays object's content
     *
     * @return string
     * @access public
     */
    public function display()
    {
        $usage = "## Usage\n\n" . $this->getSyntax() . "\n";
        if (null !== $this->getAction()) {
            $usage .= "\nAction : " . $this->getAction();
        }
        if (null !== $this->getSoftwareType()) {
            $usage .= "\nType : " . $this->getSoftwareType();
        }
        if (null !== $this->getSoftwareName()) {
            $usage .= "\nName : " . $this->getSoftwareName();
        }
        return $usage;
    }
}

