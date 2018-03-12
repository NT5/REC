<?php

namespace REC\Test\Extended\Database;

use REC\Modules\Extended\Database\DatabaseConfig;
use PHPUnit\Framework\TestCase;

class DatabaseConfigTest extends TestCase {

    /**
     *
     * @var DatabaseConfig
     */
    private $dbc;

    protected function setUp() {
        $this->dbc = new DatabaseConfig();
    }

    public function testPageConfigBasics() {
        $Basics = $this->dbc->Basics();

        $Basics->setLog("foo");

        $this->assertEquals(2, $Basics->getLogCount());
        $this->assertEquals(0, count($Basics->getWarnings()));
        $this->assertEquals(0, count($Basics->getErrors()));
    }

    public function testDatabaseConfigGettersSetters() {
        $dbc = $this->dbc;

        $this->assertEquals($dbc->setServer("foo"), $dbc->getServer());
        $this->assertEquals($dbc->setUserName("foo"), $dbc->getUserName());
        $this->assertEquals($dbc->setPassword("bar"), $dbc->getPassword());
        $this->assertEquals($dbc->setDatabase("bar"), $dbc->getDatabase());
    }

    public function testDatabaseConfigfromIniFile() {
        $iniFile = 'config.ini';
        $this->assertFileExists($iniFile);
        $dbc = DatabaseConfig::fromIniFile(NULL, $iniFile);

        $this->assertEquals("localhost", $dbc->getServer());
        $this->assertEquals("default", $dbc->getUserName());
        $this->assertEquals("default", $dbc->getPassword());
        $this->assertEquals("uml_rec", $dbc->getDatabase());
    }

}
