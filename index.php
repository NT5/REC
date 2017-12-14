<?php

require_once __DIR__ . '/vendor/autoload.php';

use REC\Modules;
use REC\Modules\Basics\Error;
use REC\Modules\Basics\Warning;

$Basics = new Modules\Basics();

$Basics->setLog("Test Log");
$Basics->addError(Error\ErrorCodes::UNKNOWN());
$Basics->addWarning(Warning\WarningCodes::UNKNOWN());

print_r($Basics->getLogger()->getLogs());
print_r($Basics->getErrors());
print_r($Basics->getWarnings());
