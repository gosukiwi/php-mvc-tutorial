<?php
function autoload($class) {
    $file_position = strrpos($class, '\\');
    if($file_position === false) {
        return;
    }

    $ds = DIRECTORY_SEPARATOR;
    $path = str_replace('\\', $ds, strtolower(substr($class, 0, $file_position + 1)));
    $file = $path . substr($class, $file_position + 1) . '.php';

    if(file_exists($file)) {
        require_once($file);
    }
}

spl_autoload_register('autoload');

// require composer's autoloader
require(__DIR__ . '/vendor/autoload.php');
