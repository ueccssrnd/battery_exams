<?php


// auto include instantiated classes
function autoload($className) {
    $directories = array(
        'system',
        'app/controllers',
        'app/models',
    );
    
    foreach ($directories as $dir) {
        $file = "$dir/$className.php";
        if (file_exists($file)) {
            require $file;
        }
    }
}
// utility to uppercase words separated by underscore
function ucWordsByUnderscore($string) {
    $words = explode('_', $string);
    foreach ($words as $word => $value) {
        $words[$word] = ucfirst($value);
    }
    return implode('', $words);
}

spl_autoload_register('autoload');