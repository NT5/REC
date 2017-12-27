<?php

namespace REC\Test\Basics\Error;

use REC\Modules\Basics\Error;
use PHPUnit\Framework\TestCase;

class ErrorStructureTest extends TestCase {

    /**
     * @covers Error\ErrorStructure
     * @covers Error\ErrorStructure::getErrorCode
     * @covers Error\ErrorCodes::getError_Code
     * @covers Error\ErrorCodes::getError_Description
     */
    public function testErrorStructureCreation() {
        $Error = new Error\ErrorStructure(Error\ErrorCodes::UNKNOWN());

        $this->assertInstanceOf(Error\ErrorStructure::class, $Error);
        $this->assertEquals(
                $Error->
                        getErrorCode()->
                        getError_Code(), Error\ErrorCodes::UNKNOWN()->
                        getError_Code()
        );
        $this->assertEquals(
                $Error->
                        getErrorCode()->
                        getError_Description(), Error\ErrorCodes::UNKNOWN()->
                        getError_Description()
        );
    }

}
