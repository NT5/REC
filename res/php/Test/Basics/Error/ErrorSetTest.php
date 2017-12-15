<?php

namespace REC\Test\Basics\Error;

use REC\Modules\Factory;
use REC\Modules\Basics\Error;
use PHPUnit\Framework\TestCase;

class ErrorSetTest extends TestCase {

    public function testErrorSetCreation() {
        $ErrorSet = new Error\ErrorSet();

        $this->assertInstanceOf(Factory\ModuleClass::class, $ErrorSet);
        $this->assertInstanceOf(Error\ErrorSet::class, $ErrorSet);
    }

    public function testErrorSetAdition() {
        $ErrorSet = new Error\ErrorSet();

        $ErrorSet->addError(Error\ErrorCodes::UNKNOWN());

        $this->assertEquals(Error\ErrorCodes::UNKNOWN()->getError_Code(), $ErrorSet->getErrors()[Error\ErrorCodes::UNKNOWN()->getError_Code()]->
                        getErrorCode()->getError_Code()
        );
        $this->assertEquals(Error\ErrorCodes::UNKNOWN()->getError_Description(), $ErrorSet->getErrors()[Error\ErrorCodes::UNKNOWN()->getError_Code()]->
                        getErrorCode()->getError_Description()
        );
    }

    public function testErrorSetaddError() {
        $ErrorSet = new Error\ErrorSet();

        $ErrorSet->addError(Error\ErrorCodes::UNKNOWN());

        $this->assertCount(1, $ErrorSet->getErrors());
        $this->assertArrayHasKey(Error\ErrorCodes::UNKNOWN()->getError_Code(), $ErrorSet->getErrors());
    }

    public function testErrorSethasError() {
        $ErrorSet = new Error\ErrorSet();

        $ErrorSet->addError(Error\ErrorCodes::UNKNOWN());

        $this->assertTrue($ErrorSet->hasError(Error\ErrorCodes::UNKNOWN()));
    }

}
