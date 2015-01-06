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
 * Define an element as fetchable
 *
 * @since 0.2
 * @author Romain L.
 */
interface IFetchable
{
    /**
     * Fetch latest release timestamp
     *
     * @return int
     * @access public
     */
    public function fetchReleaseTimestamp();

    /**
     * Fetch major version latest release
     *
     * If the element doesn't implement semver, ?
     *
     * @return int
     * @access public
     */
    public function fetchReleaseMajor();

    /**
     * Fetch minor version latest release
     *
     * If the element doesn't implement semver, ?
     *
     * @return int
     * @access public
     */
    public function fetchReleaseMinor();

    public function fetchReleasePatch();

    //public function fetchPlatform();

    /*
    * Si le soft est dispo sur plusieurs platform, la methode fetchplatform sera  un array. Si c'est le cas, alors les methode de release renvoient elles aussi un array (meme si c'est la même version)
    */
}
