<?php

spl_autoload_register(function ($class) {

    $pathParts = explode('\\', $class);
    $className = array_pop($pathParts);
    $filePath = '..' . DIRECTORY_SEPARATOR . 'protected' .DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $pathParts);
    $fileClass = $filePath . DIRECTORY_SEPARATOR . $className . '.php';

    if (is_dir($filePath) && file_exists($fileClass)) {
        require_once $fileClass;
    }
});