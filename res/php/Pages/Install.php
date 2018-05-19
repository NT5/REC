<?php

namespace REC\Pages;

use REC\Modules\Extended;
use REC\Modules\WebPage\Page;

class Install extends Page {

    /**
     * 
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended, "Instalacion");

        $this->initVars();
    }

    public function initVars() {
        $this->setVar('rec.page.title', 'Instalacion');
    }

}
