<?php

namespace REC\Application\Web\check;

use REC\Modules\Extended;
use REC\Modules\Extended\Database\DatabaseInstaller;

trait checkDatabase {

    /**
     * 
     * @return Extended
     */
    public abstract function getExtended();

    private function checkisDatabaseInstall() {
        $ex = $this->getExtended();

        $dbi = new DatabaseInstaller($ex);
        $install = $dbi->isInstalled();
        return $install;
    }

}
