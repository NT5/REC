<?php

namespace REC\Application\Web\init;

use REC\Modules\Util\Functions;
use REC\Modules\Extended;
use REC\Modules\Extended\Database;
use REC\Modules\Extended\Cookies;
use REC\Modules\Extended\PageConfig;

trait initExtended {

    /**
     *
     * @var Extended
     */
    private $Extended;

    /**
     * 
     * @return Basics
     */
    public abstract function getBasics();

    private function initExtended() {
        $Basics = $this->getBasics();
        $Cookies = $this->initCookies();
        $PageConfig = $this->initPageConfig();
        $Database = $this->initDatabase();

        $Extented = new Extended($Basics, $Cookies, $PageConfig, $Database);

        $this->Extended = $Extented;
    }

    private function initCookies() {
        $Cookies = new Cookies('REC', $this->getBasics());

        return $Cookies;
    }

    private function initPageConfig() {
        $inifile = Functions::parseDir([__DIR__, "..", "..", "..", "config.ini"]);
        $PageConfig = PageConfig::fromIniFile($this->getBasics(), $inifile);
        return $PageConfig;
    }

    private function initDatabase() {
        $Basics = $this->getBasics();
        $inifile = Functions::parseDir([__DIR__, "..", "..", "..", "config.ini"]);

        $DatabaseConf = Database\DatabaseConfig::fromIniFile($Basics, $inifile);
        $DatabaseConn = new Database\DatabaseConnection($DatabaseConf, TRUE, $Basics);
        $Database = new Database($DatabaseConn, $Basics);

        return $Database;
    }

}
