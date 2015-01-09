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
namespace App\Library\Interfaces;

/**
 * Define a release as getable
 *
 * @since 0.4
 * @author Romain L.
 */
interface IReleaseGetable
{
    /**
     * Gets platform name
     *
     * @return string
     * @access public
     */
    public function getPlatform();

    /**
     * Get major version
     *
     * @return int
     * @access public
     */
    public function getMajor();

    /**
     * Get minor version
     *
     * @return int
     * @access public
     */
    public function getMinor();

    /**
     * Get patch version
     *
     * @return int
     * @access public
     */
    public function getPatch();

    /**
     * Get publication timestamp
     *
     * @return int
     * @access public
     */
    public function getTimestamp();
}
