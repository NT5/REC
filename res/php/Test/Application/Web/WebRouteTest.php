<?php

namespace REC\Test\Application\Web;

use REC\Application\Web\WebRoute;
use PHPUnit\Framework\TestCase;

class WebRouteTest extends TestCase {

    protected function setUp() {
        $_GET = [
            'p' => 'home',
            'home' => 0
        ];
    }

    public function testWebRoute() {
        $Route = (new WebRoute())->init();

        echo $Route->getPage()->display();
    }

}
