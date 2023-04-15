<?php

spl_autoload_register ( function ($class) {
    $sources = array(
        "controllers/$class.php",
        "models/$class.php",
        "core/$class.php",
        "DAO/$class.php"
    );

    foreach ($sources as $source) {
        if (file_exists($source)) {
            require_once $source;
        } 
    } 
});