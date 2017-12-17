<?php

namespace REC\Modules\Basics;

use REC\Modules\Basics\Warning;

/**
 * @todo Documentacion
 * Clase <b>Warning</b> con métodos usados en el manejo de advertencias
 */
class Warning {

    /**
     * 
     * @var \REC\Modules\Basics\Warning\WarningCodes 
     */
    private $Warning_Code;

    /**
     *
     * @var int 
     */
    private $Warning_Time;

    /**
     * Regresa instancia de advertencias de la pagina web
     * @param \REC\Modules\Basics\Warning\WarningCodes $warning
     */
    public function __construct(Warning\WarningCodes $warning) {
        $this->Warning_Code = $warning;
        $this->Warning_Time = microtime(true);
    }

    /**
     * @return \REC\Modules\Basics\Warning\WarningCodes
     */
    public function getWarningCode() {
        return $this->Warning_Code;
    }

    /**
     * 
     * @return int
     */
    public function getWarningTime() {
        return $this->Warning_Time;
    }

}
