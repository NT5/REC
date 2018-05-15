<?php

require_once __DIR__ . '/vendor/autoload.php';

use REC\Application\Web;

\Twig_Autoloader::register();

$Web = (new Web())
        ->app();
