<?php

namespace REC\Modules;

use REC\Modules\Basics;
use REC\Modules\Extended\Cookies;
use REC\Modules\Extended\PageConfig;
use REC\Modules\Extended\Database;

class Extended extends Basics\BasicsExtend implements Cookies\CookiesInterface, PageConfig\PageConfigI, Database\DatabaseInterface {

    /**
     *
     * @var Cookies
     */
    private $Cookies;

    /**
     *
     * @var PageConfig
     */
    private $PageConfig;

    /**
     *
     * @var Database
     */
    private $Database;

    /**
     * 
     * Basics $Basics
     * @param Cookies $Cookies
     * @param PageConfig $PageConfig
     * @param Database $Database
     */
    public function __construct(Basics $Basics = NULL, Cookies $Cookies = NULL, PageConfig $PageConfig = NULL, Database $Database = NULL) {
        parent::__construct($Basics);

        $this->Cookies = ($Cookies) ? : new Cookies(NULL, $this->Basics());
        $this->PageConfig = ($PageConfig) ? : new PageConfig($this->Basics());
        $this->Database = ($Database) ? : new Database(NULL, $this->Basics());
    }

    /**
     * 
     * @return Cookies
     */
    public function Cookies() {
        return $this->Cookies;
    }

    /**
     * 
     * @return Database
     */
    public function Database() {
        return $this->Database;
    }

    /**
     * 
     * @return PageConfig
     */
    public function PageConfig() {
        return $this->PageConfig;
    }

}
