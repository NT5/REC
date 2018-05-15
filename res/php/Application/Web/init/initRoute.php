<?php

namespace REC\Application\Web\init;

use REC\Application\Web\WebRoute;
use REC\Pages;

trait initRoute {

    /**
     *
     * @var WebRoute
     */
    private $Route;

    /**
     * 
     * @return Extended
     */
    public abstract function getExtended();

    private function initRoute() {
        $Route = new WebRoute('p', Pages\Home::class, $this->getExtended());

        $Route->addRoute(
                new WebRoute('home', Pages\Home_1::class, $Route->Extended())
        );
        $Route->init();

        $this->Route = $Route;
    }

}
