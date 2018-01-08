<?php

namespace REC\Modules\Basics;

use REC\Modules\Basics\Error;
use REC\Modules\Basics\Warning;
use REC\Modules\Basics\Logger;

trait BasicsTrait {

    use Error\ErrorTrait,
        Warning\WarningTrait,
        Logger\LoggerTrait;
}
