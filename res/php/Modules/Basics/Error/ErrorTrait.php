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
}
