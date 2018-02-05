<?php

namespace REC\Test\Util;

use REC\Modules\Util;
use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase {

    public function teststartsWith() {
        $this->assertTrue(Util\Functions::startsWith('foo bar', 'foo bar'));
        $this->assertFalse(Util\Functions::startsWith('bar', 'foo bar'));
    }

    public function teststrFormat() {
        $string = "%name is foo but %name is bar";
        $this->assertEquals("bar is foo but bar is bar", Util\Functions::strFormat($string, ['name' => 'bar']));
    }

    public function testcheckArray() {
        $data = [
            "title",
            "bar"
        ];

        $this->assertTrue(Util\Functions::checkArray($data, ["title" => "", "bar" => "", "foo" => ""]));
    }

}
