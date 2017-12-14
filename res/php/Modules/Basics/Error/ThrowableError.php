<?php

namespace REC\Modules\Basics\Error;

use REC\Modules\Basics\Error;

/**
 * @todo Documentacion
 */
interface ThrowableError {

    /**
     * 
     * @return \REC\Modules\Basics\Error\ErrorSet
     */
    public function getErrorSet();

    /**
     * 
     * @param \REC\Modules\Basics\Error\ErrorCodes $Error
     */
    public function addError(Error\ErrorCodes $Error);

    /**
     * 
     * @return array
     */
    public function getErrors();
}
