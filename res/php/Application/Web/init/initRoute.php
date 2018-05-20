<?php

namespace REC\Application\Web\init;

use REC\Application\Web\WebRoute;
use REC\Modules\Extended;
use REC\Modules\Util\Functions;
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

        $this->Route = $Route->init();

        // $this->initDisplay();
    }

    private function initDisplay() {
        $Page = $this->getRoute()->getPage();
        if ($Page) {
            $Twig = $Page->getTwig();
            $PageConfig = $this->getExtended()->PageConfig();

            $Twig->setVars([
                'rec.page.title' => Functions::strFormat("%config_title | %config_var", array(
                    'config_title' => $PageConfig->getPageTitle(),
                    'config_var' => $Twig->getVar('rec.page.title')
                )),
                'rec.debug.logs' => $this->getLogs(),
                'rec.debug.executiontime' => ( microtime(true) - $this->ExecutionTime )
            ]);
            echo $Page->display();
        } else {
            echo "No pageclass found.";
        }
    }

}
