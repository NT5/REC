<?php

namespace REC\Test\Basics\Warning;

use REC\Modules\Factory;
use REC\Modules\Basics\Warning;
use PHPUnit\Framework\TestCase;

class WarningSetTest extends TestCase {

    public function testWarningSetCreation() {
        $WarningSet = new Warning\WarningSet();

        $this->assertInstanceOf(Factory\ModuleClass::class, $WarningSet);
        $this->assertInstanceOf(Warning\WarningSet::class, $WarningSet);
        $this->assertInstanceOf(Warning\WarningSet::class, $WarningSet->getWarningSet());
    }

    public function testWarningSetAdition() {
        $WarningSet = new Warning\WarningSet();

        $WarningSet->addWarning(Warning\WarningCodes::UNKNOWN());

        $this->assertEquals(Warning\WarningCodes::UNKNOWN()->getWarning_Code(), $WarningSet->getWarnings()[Warning\WarningCodes::UNKNOWN()->getWarning_Code()]->
                        getWarningCode()->getWarning_Code()
        );
        $this->assertEquals(Warning\WarningCodes::UNKNOWN()->getWarning_Description(), $WarningSet->getWarnings()[Warning\WarningCodes::UNKNOWN()->getWarning_Code()]->
                        getWarningCode()->getWarning_Description()
        );
    }

    public function testWarningSetaddError() {
        $WarningSet = new Warning\WarningSet();

        $WarningSet->addWarning(Warning\WarningCodes::UNKNOWN());

        $this->assertCount(1, $WarningSet->getWarnings());
        $this->assertArrayHasKey(Warning\WarningCodes::UNKNOWN()->getWarning_Code(), $WarningSet->getWarnings());
    }

    public function testWarningSethasError() {
        $WarningSet = new Warning\WarningSet();

        $WarningSet->addWarning(Warning\WarningCodes::UNKNOWN());

        $this->assertTrue($WarningSet->hasWarning(Warning\WarningCodes::UNKNOWN()));
    }

}
