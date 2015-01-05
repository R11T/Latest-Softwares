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
 * Define an element as gatherable
 *
 * @since 0.2
 * @author Romain L.
 */
interface IGatherable
{
    /**
     * Returns resource link in order to update dao' data
     *
     * @return string
     * @access public
     */
    public function getResourceLink();

    public function getReleaseTimestamp();

    public function getReleaseMajor();

    public function getReleaseMinor();

    public function getReleasePatch();
}
