<?php

namespace REC\Modules;

use REC\Modules\Basics;
use REC\Modules\Basics\Logger;
use REC\Modules\Basics\Warning;
use REC\Modules\Basics\Error;

/**
 * @todo Documentacion
 */
class Basics implements Logger\Loggeable, Error\ThrowableError, Warning\ThrowableWarning {

    use Basics\BasicsTrait;
}
