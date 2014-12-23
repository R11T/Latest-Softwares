<?php
namespace App\Models\Browsers;

class Firefox implements \App\Libraries\Interfaces\Software
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
