<?php
/**
 * Simplest dependencies manager, import composer one
 *
 * Need an array of required files
 *
 * @licence GPL-v2
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
