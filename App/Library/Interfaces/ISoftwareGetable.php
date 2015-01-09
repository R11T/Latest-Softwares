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
 * Define a software as getable
 *
 * @since 0.3
 * @author Romain L.
 */
interface ISoftwareGetable
{
    /**
     * Getter
     *
     * @return string
     * @access public
     */
    public function getName();

    /**
     * Getter
     *
     * @return string
     * @access public
     */
    public function getType();

    /**
     * Getter
     *
     * @return int
     * @access public
     */
    public function getLastUpdate();

    /**
     * Getter
     *
     * @return int
     * @access public
     */
    public function getCommercialName();

    /**
     * Getter
     *
     * @return \App\Library\Collection\Release
     * @access public
     */
    public function getRelease();
}
