<?php

namespace REC\Modules\Basics;

use REC\Modules\Basics\Error;
use REC\Modules\Factory;

/**
 * @todo Documentacion
 */
class Errors extends Factory\ModuleClass implements Error\ThrowableError {

    /**
     *
     * @var \REC\Modules\Basics\Error\ErrorCodes[] 
     */
    private $Errors;

    /**
     * 
     * @param self $Errors
     */
    public function __construct() {
        $this->Errors = [];
        parent::__construct("Hendell", "Carga y manejo de los posibles errores de la Pagina", "ErrorSet", 0.1);
    }

    /**
     * 
     * @param \REC\Modules\Basics\Error\ErrorCodes $Error
     */
    public function addError(Error\ErrorCodes $Error) {
        $this->Errors[$Error->getError_Code()] = new Error\ErrorStructure($Error);
    }

    /**
     * 
     * @return \REC\Modules\Basics\Error\ErrorCodes[]
     */
    public function getErrors() {
        return $this->Errors;
    }

    /**
     * 
     * @param \REC\Modules\Basics\Error\ErrorCodes $Error
     * @return boolean
     */
    public function hasError(Error\ErrorCodes $Error) {
        return (array_key_exists($Error->getError_Code(), $this->getErrors()));
    }

    /**
     * 
     * @return \REC\Modules\Basics\Errors
     */
    public function getErrorSet() {
        return $this;
    }

}
