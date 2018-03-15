<?php

namespace REC\Test\Extended\Database;

use REC\Modules\Basics\Error;
use REC\Modules\Extended\Database;
use PHPUnit\Framework\TestCase;

class DatabaseConnectionTest extends TestCase {

    /**
     *
     * @var Database\Connection
     */
    private $dbc;

    protected function setUp() {
        if (!extension_loaded('mysqli')) {
            $this->markTestSkipped(
                    'The MySQLi extension is not available.'
            );
        }

        $this->dbc = new Database\Connection(Database\DatabaseConfig::fromIniFile(), FALSE);
    }

    public function testDatabaseConnection() {
        $conn = $this->dbc;

        $conn->connect();

        $this->assertFalse($conn->Basics()->hasError(Error\ErrorCodes::CANT_CONNECT_MYSQLI_LINK));
    }

}
