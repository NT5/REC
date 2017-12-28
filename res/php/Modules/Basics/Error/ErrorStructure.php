<?php

namespace REC\Modules\Basics\Error;

use REC\Modules\Basics\Error;

/**
 * @todo Documentacion
 * Clase <b>Error</b> con métodos usados en el manejo de errores
 */
class ErrorStructure {

    /**
     *
     * @var \REC\Modules\Basics\Error\ErrorCodes 
     */
    private $Error_Code;

    /**
     *
     * @var int 
     */
    private $Error_Time;

    /**
     * Regresa instancia de errores de la pagina web
     * @param \REC\Modules\Basics\Error\ErrorCodes $error
     */
    public function __construct(Error\ErrorCodes $error) {
        $this->Error_Code = $error;
        $this->Error_Time = microtime(true);
    }

    /**
     * @return \REC\Modules\Basics\Error\ErrorCodes
     */
    public function getErrorCode() {
        return $this->Error_Code;
    }

    /**
     * 
     * @return int
     */
    public function getErrorTime() {
        return $this->Error_Time;
    }

}
