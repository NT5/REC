<?php

namespace REC\Modules\Basics;

use REC\Modules\Basics\Logger;

/**
 * Instancia que proporciona métodos para llevar un registro de ejecución
 */
class Logger implements Logger\Loggeable {

    use Logger\LoggerTrait;
}
