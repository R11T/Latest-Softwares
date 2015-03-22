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
namespace App\Fetcher;

use \App\Library\Interfaces\IFetchable;


/**
 * Fetcher of all fresh data
 *
 * @since 0.6
 * @author Romain L.
 * @see \Test\Unit\App\Fetcher\Firefox
 */
class Firefox implements IFetchable
{
    /**
     * URI
     *
     * @var string
     *
     * @access private
     * @see https://en.wikipedia.org/wiki/Uniform_resource_identifier
     */
    private $resourceLink = 'http://en.wikipedia.org/w/index.php?action=raw&title=Template:Latest_stable_software_release/Firefox';

    /**
     * Data
     *
     * @var string
     *
     * @access private
     */
    private $data;

    /**
     * Fetch data
     *
     * @return void
     * @access public
     * @throws Exception if resource doesn't exist
     */
    public function fetchData()
    {
        $resource = $this->getResourceLink();
        if ($fileHandle = @fopen($resource, 'rb')) {
            $content = stream_get_contents($fileHandle);
            fclose($fileHandle);
            //var_dump('content', $content);
            $this->setData($content);
        } else {
            throw new \Exception('Data file doesn\'t exist');
        }
    }

    /**
     * Getter
     *
     * @return string
     * @access public
     */
    public function getResourceLink()
    {
        return DATA_TEST_DIR . 'firefox';
        // eventually with a switch following virtual mode existence, or something else
        //return $this->resourceLink; Set this when we'll be in prod, not in current dev
    }

    /**
     * Setter
     *
     * @param string $data
     *
     * @return void
     * @access public
     */
    public function setData($data)
    {
        $this->data = strtolower(str_replace("\n", '', $data));
    }

    /**
     * Getter
     *
     * @return string
     * @access public
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Returns a collection of release items
     *
     * @return \App\Library\Collection\Release
     * @access public
     */
    public function fetchRelease()
    {
        $collection = null;
        foreach ($this->fetchPlatform() as $platform) {
            $data = [
                'platform'  => $platform,
                'timestamp' => $this->fetchReleaseTimestamp(),
                'major'     => $this->fetchReleaseMajor(),
                'minor'     => $this->fetchReleaseMinor(),
                'patch'     => $this->fetchReleasePatch(),
            ];
            $release = new \App\Item\Release($data);
            if (null == $collection) {
                $collection = new \App\Library\Collection\Release($release);
            } else {
                $collection->push($release);
            }
        }
        return $collection;
        $this->fetchPlatform();
    }

    /**
     * Fetch release timestamp
     *
     * @return integer
     * @access private
     */
    private function fetchReleaseTimestamp()
    {
        $regexReleaseDate = '#.*\{\{lsr.*\|latest(_| )release(_| )date ?=.*\{\{start date and age\|(?P<year>\d{4})\|(?P<month>\d{2})\|(?P<day>\d{2})\}\}#isU';
        preg_match($regexReleaseDate, $this->data, $matches);
        /* Avoid daylight saving time aftermaths by setting 12:00 */
        return strtotime($matches['year'] . '-' . $matches['month'] . '-' . $matches['day'] . ' 12:00');
    }

    /**
     * Fetch release major version
     *
     * @return integer
     * @access private
     */
    private function fetchReleaseMajor()
    {
        $regexReleaseVersion = '#.*\{\{lsr.*\| ?latest(_| )release(_| )version ?= ?(?P<major>\d+)\.(?P<minor>\d+)\.(?P<patch>\d+)#isU';
        preg_match($regexReleaseVersion, $this->data, $matches);
        return (int) $matches['major'];
    }

    /**
     * Fetch release minor version
     *
     * @return integer
     * @access private
     */
    private function fetchReleaseMinor()
    {
        $regexReleaseVersion = '#.*\{\{lsr.*\| ?latest(_| )release(_| )version ?= ?(?P<major>\d+)\.(?P<minor>\d+)\.(?P<patch>\d+)#isU';
        preg_match($regexReleaseVersion, $this->data, $matches);
        return (int) $matches['minor'];
    }

    /**
     * Fetch release patch version
     *
     * @return integer
     * @access private
     */
    private function fetchReleasePatch()
    {
        $regexReleaseVersion = '#.*\{\{lsr.*\| ?latest(_| )release(_| )version ?= ?(?P<major>\d+)\.(?P<minor>\d+)\.(?P<patch>\d+)#isU';
        preg_match($regexReleaseVersion, $this->data, $matches);
        return (int) $matches['patch'];
    }

    /**
     * Fetch platform availability
     *
     * @return array
     * @access public
     */
    public function fetchPlatform()
    {
        /* Since information isn't set, sending an arbitrary : */
        return ['windows', 'os x', 'linux'];
    }

    /**
     * Fetch developer
     *
     * @return string
     * @access public
     */
    public function fetchDeveloper()
    {
        return 'Mozilla Foundation';
    }

    public function fetchCommercialName()
    {
    }
}
