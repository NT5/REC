<?php

namespace REC\Pages;

use REC\Modules\Extended;
use REC\Modules\WebPage\Page;

/**
 * 
 */
class Test extends Page {

    /**
     * 
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended, "Test");

        $this->initVars();
    }

    public function initVars() {
        $this->setVar('rec.page.title', 'Test Page');
    }

}
