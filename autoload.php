<?php

// autoload.php @generated by Composer

if (PHP_VERSION_ID < 50600) {
    echo 'Composer 2.3.0 dropped support for autoloading on PHP <5.6 and you are running '.PHP_VERSION.', please upgrade PHP or use Composer 2.2 LTS via "composer self-update --2.2". Aborting.'.PHP_EOL;
    exit(1);
}

spl_autoload_register(function ($class_name) {
    require_once 'vendor/url2image/'.$class_name . '.php';
});
