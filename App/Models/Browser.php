<?php
/**
 * @licence GPL-v2
 */
namespace App\Models;

/**
 *
 *
 *
 *
 */
class Browser extends Software
{
    /*
    Foreach software in browsers, fetch latest informations, given its link, its name
    Following this, reorganize json file
    */

    /**
     * Browser' Data Access Object
     *
     * @var \App\Libraries\BrowserDao
     *
     * @access private
     */
    private $dao;

    public function __construct(\App\Libraries\BrowserDao $dao)
    {
        $this->dao = $dao;
    }

    public function get()
    {
        return 'It works !';
    }
}
