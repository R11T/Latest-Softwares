<?php
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
