<?php

namespace REC\Test\Basics\Error;

use REC\Modules\Basics\Error;
use PHPUnit\Framework\TestCase;

class ErrorCodesTest extends TestCase {

    /**
     * @covers Error\ErrorCodes::UNKNOWN
     */
    public function testErrorCodes() {
        $ErrorCodes = [
            Error\ErrorCodes::UNKNOWN()
        ];

        foreach ($ErrorCodes as $Error) {
            $this->assertInstanceOf(Error\ErrorCodes::class, $Error);
        }
    }

    /**
     * @covers Error\ErrorCodes
     */
    public function testErrorCode() {
        $this->assertEquals(Error\ErrorCodes::UNKNOWN, Error\ErrorCodes::UNKNOWN()->getError_Code());
    }

}
