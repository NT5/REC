<?php

namespace REC\Modules;

use REC\Modules\Factory;
use REC\Modules\Basics;
use REC\Modules\Basics\Error;
use REC\Modules\Basics\Warning;

/**
 * @todo Documentacion
 */
class Basics extends Factory\ModuleClass implements Basics\Logger\Loggeable, Basics\Error\ThrowableError, Basics\Warning\ThrowableWarning {

    /**
     * Objeto con métodos usados en el registro de seguimiento
     * @var \REC\Modules\Basics\Logger 
     */
    private $Logger;

    /**
     * Set con errores que puede generar la pagina
     * @var \REC\Modules\Basics\Error\ErrorSet 
     */
    private $ErrorSet;

    /**
     * Set con advertencias que puede generar la pagina
     * @var \REC\Modules\Basics\Warning\WarningSet
     */
    private $WarningSet;

    /**
     * 
     * @param \REC\Modules\Basics\Logger $Logger
     * @param \REC\Modules\Basics\Error\ErrorSet $ErrorSet
     * @param \REC\Modules\Basics\Warning\WarningSet $WarningSet
     */
    public function __construct(Basics\Logger $Logger = NULL, Error\ErrorSet $ErrorSet = NULL, Warning\WarningSet $WarningSet = NULL) {
        $this->Logger = ($Logger) ? : new Basics\Logger();
        $this->ErrorSet = ($ErrorSet) ? : new Error\ErrorSet();
        $this->WarningSet = ($WarningSet) ? : new Warning\WarningSet();

        $this->setLog("Nuevo objetos de modulos basicos creado.");

        parent::__construct("Hendell", "Modulos de bajo nivel para el funcionamiento de la pagina", "Basics", 0.1);
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
        $this->getLogger()->setLog($string, ...$format);
    }

    /**
     * 
     * @return \REC\Modules\Basics\Error\ErrorSet
     */
    public function getErrorSet() {
        return $this->ErrorSet;
    }

    /**
     * 
     * @param \REC\Modules\Basics\Error\ErrorCodes $Error
     */
    public function addError(Error\ErrorCodes $Error) {
        $ErrorSet = $this->getErrorSet();

        $ErrorSet->addError($Error);
    }

    /**
     * 
     * @return array
     */
    public function getErrors() {
        $ErrorSet = $this->getErrorSet();

        return $ErrorSet->getErrors();
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
     * @return array
     */
    public function getWarnings() {
        $WarningSet = $this->getWarningSet();

        return $WarningSet->getWarnings();
    }

}
