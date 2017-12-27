<?php

namespace REC\Modules\Basics\Error;

use REC\Modules\Basics\Error;

/**
 * @todo Documentacion
 */
interface ThrowableError {

    /**
     * 
     * @return \REC\Modules\Basics\Errors
     */
    public function getErrorSet();

    /**
     * 
     * @param \REC\Modules\Basics\Error\ErrorCodes $Error
     */
    public function addError(Error\ErrorCodes $Error);

    /**
     * 
     * @param \REC\Modules\Basics\Error\ErrorCodes $Error
     */
    public function hasError(Error\ErrorCodes $Error);

    /**
     * 
     * @return \REC\Modules\Basics\Errors[]
     */
    public function getErrors();
}
