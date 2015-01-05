<?php
namespace App\Model\Browser;

class Firefox implements \App\Library\Interfaces\Software
{
    private $link = 'blablabla';

    private $regexReleaseVersion = '';

    private $regexReleaseDate = '';

    public function getLink()
    {
        return $this->link;
    }

    public function setReleaseVersion()
    {
    }

    public function getData()
    {
        return rand(0, 100);
    }
}
