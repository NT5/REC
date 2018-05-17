<?php

namespace REC\Pages;

use REC\Modules\Extended;
use REC\Modules\WebPage\Page;

/**
 * 
 */
class Home extends Page {

    /**
     * 
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended, "Home");

        $this->initVars();
    }

    public function initVars() {
        $this->setVar('rec.page.title', 'Pagina de prueba');
    }

}
