<?php

namespace REC\Application\Web\init;

use REC\Modules\Basics;

trait initBasics {

    /**
     *
     * @var Basics
     */
    private $Basics;

    private function initBasics() {
        $Basics = new Basics();

        $this->Basics = $Basics;
    }

}
