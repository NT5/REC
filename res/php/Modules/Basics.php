<?php

namespace REC\Modules;

use REC\Modules\Basics;
use REC\Modules\Basics\Warning;

/**
 * @todo Documentacion
 */
class Basics implements Basics\Logger\Loggeable, Basics\Error\ThrowableError, Basics\Warning\ThrowableWarning {

    /**
     * Objeto con métodos usados en el registro de seguimiento
     * @var \REC\Modules\Basics\Logger 
     */
    private $Logger;

    /**
     * Set con errores que puede generar la pagina
     * @var \REC\Modules\Basics\Errors
     */
    private $Errors;

    /**
     * Set con advertencias que puede generar la pagina
     * @var \REC\Modules\Basics\Warning\WarningSet
     */
    private $WarningSet;

    /**
     * 
     * @param \REC\Modules\Basics\Logger $Logger
     * @param \REC\Modules\Basics\Errors $Errors
     * @param \REC\Modules\Basics\Warning\WarningSet $WarningSet
     */
    public function __construct(Basics\Logger $Logger = NULL, Basics\Errors $Errors = NULL, Warning\WarningSet $WarningSet = NULL) {
        $this->Logger = ($Logger) ? : new Basics\Logger();
        $this->Errors = ($Errors) ? : new Basics\Errors();
        $this->WarningSet = ($WarningSet) ? : new Warning\WarningSet();

        $this->setLog("Nuevo objetos de modulos basicos creado.");
    }

    /**
     * 
     * @return \REC\Modules\Basics\Logger
     */
    public function getLogger() {
        return $this->Logger;
    }

    /**
     * @param string $string
     * @param string $format
     */
    public function setLog($string, ...$format) {
        $Logger = $this->getLogger();

        $Logger->setLog($string, ...$format);
    }

    /**
     * 
     * @return \REC\Modules\Basics\Errors
     */
    public function getErrorSet() {
        return $this->Errors;
    }

    /**
     * 
     * @param int $Error
     * @return \REC\Modules\Basics\Errors
     * @throws \Exception
     */
    public function addError($Error) {
        $Errors = $this->getErrorSet();

        return $Errors->addError($Error);
    }

    /**
     * 
     * @param int $Error
     * @return bool
     */
    public function hasError($Error) {
        $Errors = $this->getErrorSet();

        return $Errors->hasError($Error);
    }

    /**
     * 
     * @return \REC\Modules\Basics\Error\ErrorCodes[]
     */
    public function getErrors() {
        $Errors = $this->getErrorSet();

        return $Errors->getErrors();
    }

    /**
     * @return \REC\Modules\Basics\Warning\WarningSet
     */
    public function getWarningSet() {
        return $this->WarningSet;
    }

    /**
     * 
     * @param int $Warning
     */
    public function addWarning(Warning\WarningCodes $Warning) {
        $WarningSet = $this->getWarningSet();

        $WarningSet->addWarning($Warning);
    }

    /**
     * 
     * @param \REC\Modules\Basics\Warning\WarningCodes $Warning
     * @return boolean
     */
    public function hasWarning(Basics\Warning\WarningCodes $Warning) {
        $WarningSet = $this->getWarningSet();

        return $WarningSet->hasWarning($Warning);
    }

    /**
     * @return array
     */
    public function getWarnings() {
        $WarningSet = $this->getWarningSet();

        return $WarningSet->getWarnings();
    }

}
