<?php

spl_autoload_register(function($className) {
    $paths = [
        'Controllers',
        'Models',
        'Lib',
    ];

    $root = dirname(__DIR__);

    $files = scandir($root);

    $exist = false;
    foreach ($files as $file) {
        $pathDir = $root.'/'.$file;
        if (is_dir($pathDir) && $file != '.' && $file != '..') {
            $pathClass = $pathDir.'/'.$className.'.php';
            if (file_exists($pathClass)) {
                require $pathClass;
                $exist = true;
                break;
            }
        }
    }

    if (!$exist) {
        throw new Exception('class '.$className. 'not found');
    }
});