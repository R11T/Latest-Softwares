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
     * Fetch data
     *
     * @return void
     * @access public
     */
    public function fetchData();

    /**
     * Fetch release data
     *
     * @return \App\Library\Collection\Release
     * @access public
     */
    public function fetchRelease();

    /**
     * Fetch platform availability
     *
     * @return array
     * @access public
     */
    public function fetchPlatform();

    /**
     * Fetch developer
     *
     * @return string
     * @access public
     */
    public function fetchDeveloper();

    /**
     * Fetch commercial name
     *
     * @return string
     * @access public
     */
    public function fetchCommercialName();
}
