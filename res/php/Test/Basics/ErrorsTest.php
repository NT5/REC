<?php

namespace REC\Test\Basics;

use REC\Modules\Basics;
use REC\Modules\Basics\Error;
use PHPUnit\Framework\TestCase;

class ErrorsTest extends TestCase {

    private $Errors;

    protected function setUp() {
        $this->Errors = new Basics\Errors();
    }

    public function testErrorsaddError() {
        $this->Errors
                ->addError(Error\ErrorCodes::UNKNOWN)
                ->addError(Error\ErrorCodes::UNKNOWN);

        $this->assertCount(2, $this->Errors->getErrors());
        $this->assertEquals(Error\ErrorCodes::UNKNOWN, $this->Errors->getErrors()[0]);
    }

    public function testErrorsaddErrorExeption() {
        $this->expectExceptionMessage("No valid value");

        $this->Errors
                ->addError("foo");

        $this->assertCount(0, $this->Errors->getErrors());
    }

    public function testErrorsgetErrorSet() {
        $this->assertInstanceOf(Basics\Errors::class, $this->Errors);
        $this->assertInstanceOf(Error\ThrowableError::class, $this->Errors);
    }

    public function testErrorshasError() {
        $this->Errors
                ->addError(Error\ErrorCodes::UNKNOWN);

        $this->assertTrue($this->Errors->hasError(Error\ErrorCodes::UNKNOWN));
        $this->assertFalse($this->Errors->hasError("0"));
        $this->assertFalse($this->Errors->hasError("foo"));
    }

}
