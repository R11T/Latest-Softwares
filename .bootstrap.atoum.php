<?php

$required = [
    'Vendor/autoload.php'
];
$loaded = false;

foreach ($required as $file) {
    if (file_exists($file)) {
        $loaded  = true;
        require_once $file;
    }
}

if (!$loaded) {
    echo "All required dependencies can't be loaded, aborting\n";
    exit;
}
