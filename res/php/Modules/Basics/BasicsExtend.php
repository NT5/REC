<?php

namespace REC\Modules\Basics;

use REC\Modules;

abstract class BasicsExtend {

    /**
     *
     * @var Modules\Basics
     */
    protected $Basics;

    /**
     * 
     * @return Modules\Basics
     */
    public function Basics() {
        return $this->Basics;
    }

    /**
     * 
     * @param \REC\Modules\Basics $Basics
     */
    public function __construct(Modules\Basics $Basics = NULL) {
        $this->Basics = ($Basics) ? : new Modules\Basics();
    }

}
