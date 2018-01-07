<?php

namespace REC\Modules\Basics;

use REC\Modules\Basics\Error;

/**
 * @todo Documentacion
 */
class Errors implements Error\ThrowableError {

    /**
     *
     * @var array
     */
    private $Errors = [];

    /**
     * 
     * @param int $Error
     * @return \REC\Modules\Basics\Errors
     * @throws \Exception
     */
    public function addError($Error) {
        if (is_int($Error)) {
            $this->Errors[] = $Error;
            return $this;
        }
        throw new \Exception("No valid value");
    }

    /**
     * 
     * @return array
     */
    public function getErrors() {
        return $this->Errors;
    }

    /**
     * 
     * @param int $Error
     * @return bool
     */
    public function hasError($Error) {
        return (in_array($Error, $this->getErrors(), TRUE));
    }

    /**
     * 
     * @return \REC\Modules\Basics\Errors
     */
    public function getErrorSet() {
        return $this;
    }

}
