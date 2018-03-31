<?php

namespace REC\Pages;

use REC\Modules\Extended;
use REC\Modules\WebPage\Page;

/**
 * 
 */
class Home_1 extends Page {

    /**
     * 
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended, "Home");

        $this->initTwigTemplate();
        $this->initVars();
    }

    public function CheckPost() {
        
    }

    public function initTwigTemplate() {
        
    }

    public function initVars() {
        $this->setVar('rec.page.title', 'Pagina de prueba 2');
    }

}
