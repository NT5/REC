<?php

namespace REC\Test\Basics;

use REC\Modules\Factory;
use REC\Modules\Basics;
use REC\Modules\Basics\Error;
use PHPUnit\Framework\TestCase;

class ErrorsTest extends TestCase {

    /**
     *  @covers Basics\Errors
     */
    public function testErrorsCreation() {
        $Errors = new Basics\Errors();

        $this->assertInstanceOf(Factory\ModuleClass::class, $Errors);
        $this->assertInstanceOf(Basics\Errors::class, $Errors);
        $this->assertInstanceOf(Basics\Errors::class, $Errors->getErrorSet());
    }

    /**
     * @covers Basics\Errors::addError
     */
    public function testErrorsAdition() {
        $Errors = new Basics\Errors();

        $Errors->addError(Error\ErrorCodes::UNKNOWN());

        $this->assertEquals(
                Error\ErrorCodes::UNKNOWN()->
                        getError_Code(), $Errors->
                        getErrors()[
                        Error\ErrorCodes::UNKNOWN()->
                        getError_Code()
                        ]->getErrorCode()->
                        getError_Code()
        );
        $this->assertEquals(
                Error\ErrorCodes::UNKNOWN()->
                        getError_Description(), $Errors->
                        getErrors()[
                        Error\ErrorCodes::UNKNOWN()->
                        getError_Code()
                        ]->getErrorCode()
                        ->getError_Description()
        );
    }

    /**
     * @covers Basics\Errors::addError
     */
    public function testErrorsaddError() {
        $Errors = new Basics\Errors();

        $Errors->addError(Error\ErrorCodes::UNKNOWN());

        $this->assertCount(1, $Errors->getErrors());
        $this->assertArrayHasKey(Error\ErrorCodes::UNKNOWN()->getError_Code(), $Errors->getErrors());
    }

    /**
     * @covers Basics\Errors::addError
     * @covers Basics\Errors::hasError
     */
    public function testErrorshasError() {
        $Errors = new Basics\Errors();

        $Errors->addError(Error\ErrorCodes::UNKNOWN());

        $this->assertTrue($Errors->hasError(Error\ErrorCodes::UNKNOWN()));
    }

    /**
     * @covers Basics\Errors::addError
     * @covers Basics\Errors::hasError
     */
    public function testErrorshasErrorCi() {
        $Errors = new Basics\Errors();

        $this->assertTrue(
                $Errors->addError(Error\ErrorCodes::UNKNOWN())
                        ->hasError(Error\ErrorCodes::UNKNOWN())
        );
    }

}
