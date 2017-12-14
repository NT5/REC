<?php

namespace REC\Modules\Basics\Warning;

/**
 * @todo Documentacion
 * Clase con las advertencias validas
 */
class WarningCodes {

    /**
     * @var int Advertencia desconocida
     */
    const UNKNOWN = 0;

    /**
     * Advertencia desconocida
     * @return \self
     */
    public static final function UNKNOWN() {
        return new self(self::UNKNOWN, "Advertencia desconocida");
    }

    /**
     *
     * @var int
     */
    private $Warning_Code;

    /**
     *
     * @var string
     */
    private $Warning_Description;

    /**
     * 
     * @param int $warning_code
     * @param string $warning_description
     */
    private function __construct($warning_code, $warning_description) {
        $this->Warning_Code = $warning_code;
        $this->Warning_Description = $warning_description;
    }

    /**
     * 
     * @return int
     */
    public function getWarning_Code() {
        return $this->Warning_Code;
    }

    /**
     * 
     * @return string
     */
    public function getWarning_Description() {
        return $this->Warning_Description;
    }

}
