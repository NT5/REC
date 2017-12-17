<?php

namespace REC\Test\Basics\Warning;

use REC\Modules\Basics\Warning;
use PHPUnit\Framework\TestCase;

class WarningCodesTest extends TestCase {

    public function testWarningCodes() {
        $WarningCodes = [
            Warning\WarningCodes::UNKNOWN()
        ];

        foreach ($WarningCodes as $Warning) {
            $this->assertInstanceOf(Warning\WarningCodes::class, $Warning);
        }
    }

    public function testErrorCode() {
        $this->assertEquals(Warning\WarningCodes::UNKNOWN, Warning\WarningCodes::UNKNOWN()->getWarning_Code());
    }

}
