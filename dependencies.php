<?php
/**
 * Simplest dependencies manager, import composer one
 *
 * Need an array of required files
 *
 * @licence GPL-v2
 * Summary :
 * « You may copy, distribute and modify the software as long as
 * you track changes/dates of in source files and keep all modifications under GPL.
 * You can distribute your application using a GPL library commercially,
 * but you must also disclose the source code. »
 *
 * @link https://www.tldrlegal.com/l/gpl2
 * @see LICENSE file
 * @since 0.1
 * @author Romain L.
 */
function loadDependencies(array $required)
{
    foreach ($required as $file) {
        $file = __DIR__ . '/' . $file;
        if (!file_exists($file)) {
            echo "[" . $file . "] : dependency can't be loaded, aborting\n";
            exit(1);
        }
        require_once $file;
    }
 }
