<?php

namespace REC\Application\Web\init;

use REC\Application\Web\WebRoute;
use REC\Modules\Util\Functions;

trait initDisplay {

    /**
     * 
     * @return WebRoute
     */
    public abstract function getRoute();

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
