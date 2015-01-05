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
namespace App\Library\Dao;

/**
 * Browser' Data Access Object
 *
 * @author Romain L.
 * @since 0.1
 */
class Browser extends Software
{
    /**
     * Returns software type
     *
     * @return string
     * @access public
     */
    public function getType()
    {
        return 'browser';
    }
}
