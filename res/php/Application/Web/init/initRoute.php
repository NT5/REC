<?php

namespace REC\Application\Web\init;

use REC\Application\Web\WebRoute;
use REC\Modules\Extended;
use REC\Pages;
use REC\Application\Web\check;

trait initRoute {

    use check\checkRoute;

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

    /**
     * @return \REC\Modules\Basics\Logger\Log[] Lista de registros
     */
    public abstract function getLogs();

    private function initRoute() {
        $Route = new WebRoute('p', Pages\Home::class, $this->getExtended());
        $Ex = $Route->Extended();

        $Route
                ->addRoute(new WebRoute('home', Pages\Home::class, $Ex))
                ->addRoute(new WebRoute('install', Pages\Install::class, $Ex))
                ->addRoute(new WebRoute('test', Pages\Test::class, $Ex));

        $this->Route = $Route;

        $this->checkRoute();
    }

}
