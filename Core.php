<?php

define('ROOT_DIR', __DIR__ . '/');

// Project's constants declaration and init

spl_autoload_register(function ($class) {
        require_once str_replace('\\', '/', $class) . '.php';
});
