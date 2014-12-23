<?php
/**
 * @licence GPL-v2
 */
namespace App\Controllers;

use \App\Libraries;
use \App\Models;

/**
 *
 */
class Browser
{
    /**
     * Get browser' data
     *
     */
    public function get()
    {
        $dao   = new Libraries\BrowserDao();
        $model = new Models\Browser($dao);

        return $model->get();

    }
}
