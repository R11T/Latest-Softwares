<?php
namespace App\Model\Browser;

class Chrome implements \App\Library\Interfaces\Software
{
    private $link = 'http://en.wikipedia.org/w/index.php?action=raw&title=Template:Latest_stable_software_release/Google_Chrome';
    private $file;

    private $regexReleaseVersion = '#.*\|latest[ _]?release[ _]?version[ ]?=[ ]?([\d]+)\.([\d]+)\.([\d]+).*\|#';

    private $regexReleaseDate = '#.* \|[ ]?date[ ]?=(.*) \|#';

    private $regexReleaseOs = '#\; ([\w, ]*) {{LSR#';

    private $data = [];

    public function __construct()
    {
        $this->setFile($this->link);
        $this->setReleaseOs();
        $this->setReleaseVersion();
        $this->setReleaseDate();
    }

    public function getLink()
    {
        return $this->link;
    }

    public function getData()
    {
        return $this->data;
    }

    protected function setFile($link)
    {
        $tmp = 'chrome.tmp';
        if (!file_exists($tmp)) {
            $wiki = file_get_contents($this->link);
            file_put_contents($tmp, str_replace("\n", ' ', file_get_contents($this->link)));
        }

        $this->file = file_get_contents($tmp);
    }

    protected function setReleaseOs()
    {
        preg_match($this->regexReleaseOs, $this->file, $matches);
        $this->data['release']['latest']['os'] = array_map(function ($e) {
            return trim($e);
        }, explode(',', $matches[1]));
    }

    public function setReleaseVersion()
    {
        preg_match($this->regexReleaseVersion, $this->file, $matches);
        $this->data['release']['latest']['version']['major'] = $matches[1];
        $this->data['release']['latest']['version']['minor'] = $matches[2];
        $this->data['release']['latest']['version']['patch'] = $matches[3];
    }

    protected function setReleaseDate()
    {
        preg_match($this->regexReleaseDate, $this->file, $matches);
        $this->data['release']['latest']['time'] = strtotime($matches[1]);
    }
}
