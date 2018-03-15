<?php

namespace REC\Test\Extended\Database;

use REC\Modules\Extended\Database\DatabaseUtil;
use PHPUnit\Framework\TestCase;

class DatabaseUtilTest extends TestCase {

    public function testDatabaseUtilsqlFromFile() {
        $file = 'res/sql/phpunit.sql';

        $this->assertFileExists($file);

        $this->assertEquals(1, count(DatabaseUtil::sqlFromFile($file)));
    }

}
