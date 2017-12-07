<?php

require_once __DIR__ . '/vendor/autoload.php';

use REC\Modules;

$Logger = new Modules\Logger();
$Logger->setLog("Test Log");

print_r($Logger->getLogs());
