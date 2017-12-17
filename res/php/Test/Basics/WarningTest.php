<?php

namespace REC\Test\Basics;

use REC\Modules\Basics;
use PHPUnit\Framework\TestCase;

class WarningTest extends TestCase {

    public function testWarningCreation() {
        $Warning = new Basics\Warning(Basics\Warning\WarningCodes::UNKNOWN());

        $this->assertInstanceOf(Basics\Warning::class, $Warning);
        $this->assertEquals($Warning->getWarningCode()->getWarning_Code(), Basics\Warning\WarningCodes::UNKNOWN()->getWarning_Code());
        $this->assertEquals($Warning->getWarningCode()->getWarning_Description(), Basics\Warning\WarningCodes::UNKNOWN()->getWarning_Description());
    }

}
