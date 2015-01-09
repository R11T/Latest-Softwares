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
  * Release Data Transport Object
  *
  * Represents a release at a T time
  *
  * @since 0.4
  * @author Romain L.
  * @see \Test\Unit\App\Item\Release
  */
 class Release implements Interfaces\IReleaseGetable, Interfaces\IDisplayable
 {
    /**
     * Platform name
     *
     * @var string
     *
     * @access private
     */
    private $platform;

    /**
     * Major version
     *
     * @var int
     *
     * @access private
     * @see http://semver.org/
     */
    private $major;

    /**
     * Minor version
     *
     * If the element doesn't implement semver, should be equal to 0
     *
     * @var int
     *
     * @access private
     * @see http://semver.org/
     */
    private $minor;

    /**
     * Patch version
     *
     * If the element doesn't implement semver, should be equal to 0
     *
     * @var int
     *
     * @access private
     * @see http://semver.org/
     */
    private $patch;

    /**
     * Publication timestamp
     *
     * @var int
     *
     * @access private
     */
    private $timestamp;

    /**
     * __construct()
     *
     * @access public
     */
    public function __construct($data)
    {
        $this->platform  = (string) $data['platform'];
        $this->major     = (int)    $data['major'];
        $this->minor     = (int)    $data['minor'];
        $this->patch     = (int)    $data['patch'];
        $this->timestamp = (int)    $data['timestamp'];
    }

    /**
     * Getter
     *
     * @return string
     * @access public
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * Getter
     *
     * @return int
     * @access public
     */
    public function getMajor()
    {
        return $this->major;
    }

    /**
     * Getter
     *
     * @return int
     * @access public
     */
    public function getMinor()
    {
        return $this->minor;
    }

    /**
     * Geter
     *
     * @return int
     * @access public
     */
    public function getPatch()
    {
        return $this->patch;
    }

    /**
     * Getter
     *
     * @return int
     * @access public
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Displays element's content
     *
     * @return array
     * @access public
     */
    public function display()
    {
        return [$this->getPlatform() => [
            'timestamp' => $this->getTimestamp(),
            'major'     => $this->getMajor(),
            'minor'     => $this->getMinor(),
            'patch'     => $this->getPatch(),
        ]];
    }
 }
