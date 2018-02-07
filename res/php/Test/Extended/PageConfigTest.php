<?php

namespace REC\Test\Extended;

use REC\Modules\Extended\PageConfig;
use PHPUnit\Framework\TestCase;

class PageConfigTest extends TestCase {

    /**
     *
     * @var PageConfig
     */
    private $PageConfig;

    protected function setUp() {
        $this->PageConfig = new PageConfig();
    }

    public function testPageConfigBasics() {
        $Basics = $this->PageConfig->Basics();

        $Basics->setLog("foo");

        $this->assertEquals(2, $Basics->getLogCount());
        $this->assertEquals(0, count($Basics->getWarnings()));
        $this->assertEquals(0, count($Basics->getErrors()));
    }

    public function testPageConfigGettersSetters() {
        $PageConfig = $this->PageConfig;

        $this->assertEquals($PageConfig->setPageTitle("foo"), $PageConfig->getPageTitle());
        $this->assertEquals($PageConfig->setFirstRun(false), $PageConfig->getFirstRun());
        $this->assertEquals($PageConfig->setPageDomain("bar"), $PageConfig->getPageDomain());
        $this->assertEquals($PageConfig->setEnableDebug(true), $PageConfig->getEnableDebug());
    }

    public function testPageConfigfromIniFile() {
        $iniFile = 'config.ini';
        $this->assertFileExists($iniFile);

        $PageConfig = PageConfig::fromIniFile(NULL, $iniFile);

        $this->assertEquals("REC", $PageConfig->getPageTitle());
        $this->assertEquals(TRUE, $PageConfig->getFirstRun());
        $this->assertEquals(FALSE, $PageConfig->getPageDomain());
        $this->assertEquals(TRUE, $PageConfig->getEnableDebug());
    }

}
