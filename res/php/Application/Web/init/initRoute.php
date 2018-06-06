<?php

namespace REC\Application\Web\init;

use REC\Application\Web\WebRoute;
use REC\Modules\Extended;
use REC\Pages;

trait initRoute {

    /**
     *
     * @var WebRoute
     */
    private $Route;

    /**
     * @var float
     */
    private $ExecutionTime;

    /**
     * 
     * @return Extended
     */
    public abstract function getExtended();

    /**
     * 
     * @return WebRoute
     */
    public abstract function getRoute();

    private function initRoute() {
        $Route = new WebRoute('p', Pages\Home::class, $this->getExtended());
        $Ex = $Route->Extended();

        $Route
                ->addRoute(new WebRoute('home', Pages\Home::class, $Ex))
                ->addRoute(new WebRoute('install', Pages\Install::class, $Ex))
                ->addRoute(new WebRoute('test', Pages\Test::class, $Ex));

        $this->Route = $Route->init();
    }

}
