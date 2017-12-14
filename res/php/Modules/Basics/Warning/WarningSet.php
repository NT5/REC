<?php

namespace REC\Modules\Basics\Warning;

use REC\Modules\Basics;
use REC\Modules\Factory;

/**
 * @todo Documentacion
 */
class WarningSet extends Factory\ModuleClass {

    /**
     *
     * @var array 
     */
    private $Warnings;

    public function __construct() {
        $this->Warnings = [];
        parent::__construct("Hendell", "Carga y manejo de las posibles advertencias de la Pagina", "WarningSet", 0.1);
    }

    /**
     * 
     * @param \REC\Modules\Basics\Warning\WarningCodes $Warning
     */
    public function addWarning(Basics\Warning\WarningCodes $Warning) {
        $this->Warnings[] = new Basics\Warning($Warning);
    }

    /**
     * 
     * @return array
     */
    public function getWarnings() {
        return $this->Warnings;
    }

}
