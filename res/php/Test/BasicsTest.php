<?php

namespace REC\Test;

use REC\Modules;
use REC\Modules\Factory;
use REC\Modules\Basics;
use REC\Modules\Basics\Warning;
use REC\Modules\Basics\Error;
use REC\Modules\Basics\Logger;
use PHPUnit\Framework\TestCase;

class BasicsTest extends TestCase {

    public function testBasicsCreation() {
        $Basics = new Modules\Basics();

        $this->assertInstanceOf(Factory\ModuleClass::class, $Basics);
        $this->assertInstanceOf(Warning\ThrowableWarning::class, $Basics);
        $this->assertInstanceOf(Error\ThrowableError::class, $Basics);
        $this->assertInstanceOf(Logger\Loggeable::class, $Basics);
    }

    public function testBasicCreationManual() {
        $Logger = new Basics\Logger();
        $Errors = new Basics\Errors();
        $WarningSet = new Warning\WarningSet();

        $Basics = new Modules\Basics($Logger, $Errors, $WarningSet);

        $this->assertInstanceOf(Warning\WarningSet::class, $Basics->getWarningSet());
        $this->assertInstanceOf(Basics\Errors::class, $Basics->getErrorSet());
        $this->assertInstanceOf(Basics\Logger::class, $Basics->getLogger());
    }

    public function testSetLog() {
        $Basics = new Modules\Basics();
        $Logger = $Basics->getLogger();
        // $Logger->setTraceSteps(2);

        $Basics->setLog("foo");
        $Basics->setLog("foo %s %s", "bar", "foo");

        $this->assertEquals(4, $Logger->getLogCount());

        $FooLog = $Logger->getLog(self::class);

        $this->assertNotFalse($FooLog);
        $this->assertEquals("foo", $FooLog[0]->getText());
        $this->assertEquals("foo bar foo", $FooLog[1]->getText());
    }

    public function testaddError() {
        $Basics = new Modules\Basics();

        $Basics->addError(Error\ErrorCodes::UNKNOWN());

        $this->assertCount(1, $Basics->getErrors());
    }

    public function testhasError() {
        $Basics = new Modules\Basics();

        $ErrorCode = Error\ErrorCodes::UNKNOWN();

        $Basics->addError($ErrorCode);

        $this->assertTrue($Basics->hasError($ErrorCode));
    }

    public function testaddWarning() {
        $Basics = new Modules\Basics();

        $Basics->addWarning(Warning\WarningCodes::UNKNOWN());

        $this->assertCount(1, $Basics->getWarnings());
    }

    public function testhasWarning() {
        $Basics = new Modules\Basics();

        $WarnigCode = Warning\WarningCodes::UNKNOWN();

        $Basics->addWarning($WarnigCode);

        $this->assertTrue($Basics->hasWarning($WarnigCode));
    }

}
