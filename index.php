<?php

require_once __DIR__ . '/vendor/autoload.php';

use REC\Application\Web\WebRoute;
use REC\Pages;

\Twig_Autoloader::register();

$Web = new WebRoute('p', Pages\Home::class);

$Web->addRoute(new WebRoute('home', Pages\Home_1::class, $Web->Extended()));

$Web->init();
