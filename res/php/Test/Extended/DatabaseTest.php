<?php

namespace REC\Test\Extended;

use REC\Modules\Basics;
use REC\Modules\Extended\Database;
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase {

    /**
     *
     * @var Database
     */
    private $db;

    protected function setUp() {
        $b = new Basics();
        $this->db = new Database(
                new Database\DatabaseConnection(Database\DatabaseConfig::fromIniFile($b, 'config.ini'), TRUE, $b
        ));
    }

    protected function tearDown() {
        $this->db->close();
    }

    public function testDatabasedisableForeignKeyChecks() {
        $this->assertNotNull($this->db->disableForeignKeyChecks());
    }

    public function testDatabaseenableForeignKeyChecks() {
        $this->assertNotNull($this->db->enableForeignKeyChecks());
    }

}
