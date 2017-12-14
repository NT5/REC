<?php

namespace REC\Test\Basics;

use REC\Modules\Basics;
use PHPUnit\Framework\TestCase;

class LoggerTest extends TestCase {

    public function testLoggerCreation() {
        $Logger = new Basics\Logger();

        $this->assertInstanceOf(Basics\Logger::class, $Logger);
    }

    public function testLoggerAdition() {
        $Logger = new Basics\Logger();
        $Logs_Count = 10;

        for ($i = 0; $i < $Logs_Count; $i++) {
            $Logger->setLog("Test Log: $i");
        }
        $this->assertEquals(($Logs_Count + 1), $Logger->getLogCount());
    }

    public function testFormattedLogger() {
        $Logger = new Basics\Logger();
        $Logger->setTraceSteps(2);

        $Logger->setLog("%s", "foo");
        $Logger->setLog("%s %s", "foo", "bar");

        $this->assertEquals(3, $Logger->getLogCount());
        $this->assertEquals("foo", $Logger->getLog(self::class)[1]->getText());
        $this->assertEquals("foo bar", $Logger->getLog(self::class)[2]->getText());
    }

}
