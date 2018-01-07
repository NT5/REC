<?php

namespace REC\Modules\Basics\Error;

trait ErrorTrait {

    /**
     *
     * @var array
     */
    protected $Errors = [];

    use ErrorAdition,
        ErrorGetter,
        ErrorChecks;

    /**
     * 
     * @return \REC\Modules\Basics\Errors
     */
    public function getErrorSet() {
        return $this;
    }

}
