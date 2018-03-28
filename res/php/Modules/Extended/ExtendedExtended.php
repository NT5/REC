<?php

namespace REC\Modules\Extended;

use REC\Modules\Extended;
use REC\Modules\Basics;
use REC\Modules\Basics\BasicsExtend;

abstract class ExtendedExtended extends BasicsExtend {

    /**
     *
     * @var Extended
     */
    protected $Extended;

    /**
     * 
     * @return Extended
     */
    public function Extended() {
        return $this->Extended;
    }

    /**
     * 
     * @param Extended $Extended
     * @param Basics $Basics
     */
    public function __construct(Extended $Extended = NULL, Basics $Basics = NULL) {
        parent::__construct($Basics);

        $this->Extended = ($Extended) ? : new Extended($this->Basics());
    }

}
