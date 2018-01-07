<?php

namespace REC\Modules\Basics\Error;

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
     * @param int $Error
     * @return \REC\Modules\Basics\Errors
     * @throws \Exception
     */
    public function addError($Error);

    /**
     * 
     * @param int $index
     * @return int|FALSE
     */
    public function getError($index);

    /**
     * 
     * @param int $Error
     * @return bool
     */
    public function hasError($Error);

    /**
     * 
     * @return array
     */
    public function getErrors();
}
