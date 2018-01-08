<?php

namespace REC\Test;

use REC\Modules;
use REC\Modules\Basics\Error;
use REC\Modules\Basics\Warning;
use REC\Modules\Basics\Logger;
use PHPUnit\Framework\TestCase;

class BasicsTest extends TestCase {

    public function testBasicsCreation() {
        $Basics = new Modules\Basics();

        $this->assertInstanceOf(Error\ThrowableError::class, $Basics);
        $this->assertInstanceOf(Warning\ThrowableWarning::class, $Basics);
        $this->assertInstanceOf(Logger\Loggeable::class, $Basics);
    }

}
