<?php

require_once __DIR__ . '/vendor/autoload.php';

use REC\Modules\WebPage;

\Twig_Autoloader::register();

$WebPage = new WebPage();

$WebPage
        ->initPage()
        ->display();
