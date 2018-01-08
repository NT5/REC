<?php

namespace REC\Modules\Basics\Warning;

trait WarningTrait {

    /**
     *
     * @var array
     */
    protected $Warnings = [];

    use WarningAdition,
        WarningGetter,
        WarningChecks;
}
