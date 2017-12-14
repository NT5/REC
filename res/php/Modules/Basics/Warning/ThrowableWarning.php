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
     * @param int $Warning
     */
    public function addWarning(Warning\WarningCodes $Warning);

    /**
     * 
     * @return array
     */
    public function getWarnings();
}
