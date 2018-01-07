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

    /**
     * 
     * @return \REC\Modules\Basics\Warnings
     */
    public function getWarningSet() {
        return $this;
    }

}
