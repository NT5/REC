<?php

namespace REC\Test\Basics;

use REC\Modules\Basics;
use PHPUnit\Framework\TestCase;

class ErrorTest extends TestCase {

    public function testErrorCreation() {
        $Error = new Basics\Error(Basics\Error\ErrorCodes::UNKNOWN());

        $this->assertInstanceOf(Basics\Error::class, $Error);
        $this->assertEquals($Error->getErrorCode()->getError_Code(), Basics\Error\ErrorCodes::UNKNOWN()->getError_Code());
        $this->assertEquals($Error->getErrorCode()->getError_Description(), Basics\Error\ErrorCodes::UNKNOWN()->getError_Description());
    }

}
