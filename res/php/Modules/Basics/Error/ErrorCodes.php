<?php

namespace REC\Modules\Basics\Error;

/**
 * @todo Documentacion
 * Clase con los errores validos
 */
class ErrorCodes {

    /**
     * @var int Error desconocido
     */
    const UNKNOWN = 0;

    /**
     * Error desconocido
     * @return \self
     */
    public static final function UNKNOWN() {
        return new self(self::UNKNOWN, "Error desconocido");
    }

    /**
     *
     * @var int
     */
    private $Error_Code;

    /**
     *
     * @var string
     */
    private $Error_Description;

    /**
     * 
     * @param int $error_code
     * @param string $error_description
     */
    private function __construct($error_code, $error_description) {
        $this->Error_Code = $error_code;
        $this->Error_Description = $error_description;
    }

    /**
     * 
     * @return int
     */
    public function getError_Code() {
        return $this->Error_Code;
    }

    /**
     * 
     * @return string
     */
    public function getError_Description() {
        return $this->Error_Description;
    }

}
