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
namespace App\Library;

class Db extends \PDO
{
    /**
     * __construct()
     *
     * @param string $filename
     *
     * @access public
     */
    public function __construct($filename)
    {
        parent::__construct('sqlite:' . $filename);
    }

    //TODO:  transaction with multiqueries system
}
