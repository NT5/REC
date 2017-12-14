<?php

namespace REC\Modules\Basics\Error;

use REC\Modules\Basics;
use REC\Modules\Factory;

/**
 * @todo Documentacion
 */
class ErrorSet extends Factory\ModuleClass {

    /**
     *
     * @var array 
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
    public function addError(Basics\Error\ErrorCodes $Error) {
        $this->Errors[] = new Basics\Error($Error);
    }

    /**
     * 
     * @return array
     */
    public function getErrors() {
        return $this->Errors;
    }

}
