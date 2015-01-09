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

class Release extends \App\Library\Collection implements Interfaces\IDisplayable
{
    // construct identique : principe Liskov

    public function display()
    {
        // var_dump($items->);
        foreach ($items as $release) {
            $data[$release->getPlatform()] = [
                'timestamp' => $release->getTimestamp(),
                'major'     => $release->getMajor(),
                'minor'     => $release->getMinor(),
                'patch'     => $release->getPatch()
            ];
        }
    }
}
