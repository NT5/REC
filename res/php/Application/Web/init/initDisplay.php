<?php

namespace REC\Application\Web\init;

use REC\Application\Web\WebRoute;
use REC\Modules\Util\Functions;
use REC\Modules\Basics;
use REC\Modules\Extended;

trait initDisplay {

    /**
     * 
     * @return WebRoute
     */
    public abstract function getRoute();

    /**
     * 
     * @return Basics
     */
    public abstract function getBasics();

    /**
     * 
     * @return Extended
     */
    public abstract function getExtended();

    private function initDisplay() {
        $Page = $this->getRoute()->getPage();
        $b = $this->getBasics();
        $e = $this->getExtended();

        if ($Page) {
            $Twig = $Page->getTwig();
            $PageConfig = $e->PageConfig();

            $Twig->setVars([
                'rec.page.title' => Functions::strFormat("%config_title | %config_var", array(
                    'config_title' => $PageConfig->getPageTitle(),
                    'config_var' => $Twig->getVar('rec.page.title')
                )),
                'rec.debug.logs' => $b->getLogs(),
                'rec.debug.executiontime' => ( microtime(true) - $this->ExecutionTime ),
                'rec.state.errors' => $b->getErrors(),
                'rec.state.warnings' => $b->getWarnings(),
                'rec.page.config' => $PageConfig
            ]);
            echo $Page->display();
        } else {
            echo "No pageclass found.";
        }
    }

}
