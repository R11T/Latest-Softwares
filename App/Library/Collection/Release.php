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
namespace App\Library\Collection;

use \App\Library\Interfaces;

/**
 * Collection of releases
 *
 * @since 0.4
 * @author Romain L.
 * @see \Test\Unit\App\Library\Collection\Release
 */
class Release extends \App\Library\Collection implements Interfaces\IDisplayable
{
    /**
     * Display releases content
     *
     * @return array
     * @access public
     */
    public function display()
    {
        $temp = [];
        foreach ($this->items as $release) {
            $temp = array_merge($temp, $release->display());
        }
        return $temp;
    }
}
