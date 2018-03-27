<?php

require_once __DIR__ . '/vendor/autoload.php';

Twig_Autoloader::register();


$Page = new \REC\Pages\Home();

echo $Page->display();

print_r($Page->Basics()->getLogs());