<?php

namespace REC\Modules\Basics\Warning;

use REC\Modules\Basics\Warning;

/**
 * @todo Documentacion
 */
interface ThrowableWarning {

    /**
     * 
     * @return \REC\Modules\Basics\Warning\WarningSet
     */
    public function getWarningSet();

    /**
     * 
     * @param \REC\Modules\Basics\Warning\WarningCodes $Warning
     */
    public function addWarning(Warning\WarningCodes $Warning);

    /**
     * 
     * @param \REC\Modules\Basics\Warning\WarningCodes $Warning
     */
    public function hasWarning(Warning\WarningCodes $Warning);

    /**
     * 
     * @return array
     */
    public function getWarnings();
}
