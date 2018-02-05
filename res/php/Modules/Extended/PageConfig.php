<?php

namespace REC\Modules\Extended;

use REC\Modules\Basics\Warning;
use REC\Modules\Util;
use REC\Modules;

/**
 * @todo Documentar
 * Clase que contiene metodos y variables de configuracion de la pagina
 */
class PageConfig {

    /**
     *
     * @var Modules\Basics 
     */
    private $Basics;

    /**
     * @var string Cadena de texto con el titulo de la pagina
     */
    private $page_title;

    /**
     * @var boolean Variable que comprueba el estado de la instalación
     */
    private $first_run;

    /**
     *
     * @var string 
     */
    private $page_domain;

    /**
     *
     * @var bool 
     */
    private $enable_debug;

    /**
     * Regresa instancia de configuración de la pagina web
     * @param Modules\Basics $Basics
     * @param string $page_title cadena de texto que se usa en los tags <b>title</b>
     * @param boolean $first_run Es la primera ejecucion de la pagina
     * @param string $page_domain
     * @param bool $enable_debug
     */
    public function __construct(Modules\Basics $Basics = NULL, $page_title = NULL, $first_run = TRUE, $page_domain = NULL, $enable_debug = TRUE) {
        $this->Basics = ($Basics) ? : new Modules\Basics();

        $this->page_title = ($page_title) ? : "Default";
        $this->first_run = ($first_run == TRUE ? TRUE : FALSE);
        $this->page_domain = ($page_domain) ? : FALSE;
        $this->enable_debug = ($enable_debug == TRUE ? TRUE : FALSE);

        $this->Basics()->setLog("Nueva instancia de configuración de pagina creada");
    }

    /**
     * 
     * @return Modules\Basics
     */
    public function Basics() {
        return $this->Basics;
    }

    /**
     * 
     * @return string
     */
    public function getPageTitle() {
        return $this->page_title;
    }

    /**
     * 
     * @return boolean
     */
    public function getFirstRun() {
        return $this->first_run;
    }

    /**
     * 
     * @return string
     */
    public function getPageDomain() {
        return $this->page_domain;
    }

    /**
     * 
     * @return boolean
     */
    public function getEnableDebug() {
        return $this->enable_debug;
    }

    /**
     * 
     * @param string $title
     */
    public function setPageTitle($title) {
        $this->page_title = $title;
    }

    /**
     * 
     * @param boolean $first_run
     */
    public function setFirstRun($first_run) {
        $this->first_run = $first_run;
    }

    /**
     * 
     * @param string $page_domain
     */
    public function setPageDomain($page_domain) {
        $this->page_domain = $page_domain;
    }

    /**
     * 
     * @param boolean $enable_debug
     */
    public function setEnableDebug($enable_debug) {
        $this->enable_debug = $enable_debug;
    }

    /**
     * Guarda la configuracion en un archivo .ini
     * @param string $ini Ruta del archivo .ini en el servidor
     * @return boolean
     */
    public function saveToIni($ini = 'config.ini') {

        $this->Basics()->setLog("Intentando guardar configuración en el archivo $ini...");

        $data = [
            "title" => $this->getPageTitle(),
            "first_run" => ($this->getFirstRun() ? "true" : "false"),
            "page_domain" => $this->getPageDomain(),
            "enable_debug" => ($this->getEnableDebug() ? "true" : "false")
        ];
        $ini_area = "REC";

        foreach ($data as $index => $value) {
            if (Util\Files::set_ini_file($ini, $ini_area, $index, $value)) {
                $this->Basics()->setLog("La variable %s fue guardada correctamente con el valor: %s", $index, $value);
                continue;
            } else {
                $this->Basics()->setLog("No se pudo guardar el archivo de configuración; operacion abortada");
                $this->Basics()->addWarning(Warning\WarningCodes::CANT_SAVE_PAGE_CONFIG_FILE);
                return FALSE;
            }
        }
        $this->Basics()->setLog("El archivo $ini fue guardado correctamente");
        return TRUE;
    }

    /**
     * Regresa instancia de configuración de la pagina web cargada desde un archivo .ini valido
     * @param Modules\Basics $Basics
     * @param string $inifile Ruta del archivo .ini en el servidor
     * @return PageConfig Regresa instancia de configuracion creada
     */
    public static function fromIniFile(Modules\Basics $Basics = NULL, $inifile = 'config.ini') {
        $ini = Util\Files::load_ini_file($inifile);

        if ($ini) {
            $Basics->setLog("Comprobando estructura de $inifile...");

            $valid_structure = [
                "title",
                "first_run",
                "page_domain",
                "enable_debug"
            ];
            $ini_area = "REC";

            if (Util\Functions::checkArray([$ini_area], $ini) && Util\Functions::checkArray($valid_structure, $ini[$ini_area])) {
                $instance = new self(
                        $Basics, $ini[$ini_area]["title"], $ini[$ini_area]["first_run"], $ini[$ini_area]["page_domain"], $ini[$ini_area]["enable_debug"]
                );
                $Basics->setLog("Instancia de configuración creada correctamente con $inifile");

                return $instance;
            } else {
                $Basics->setLog("El archivo $inifile tiene una estructura invalida");

                $Basics->addWarning(Warning\WarningCodes::PAGE_CONFIGURATION_INVALID_FORMAT);
                $Basics->addWarning(Warning\WarningCodes::DEFAULT_PAGE_CONFIGURATION);

                return new self();
            }
        } else {
            $Basics->setLog("El archivo $inifile no pudo ser cargado");

            $Basics->addWarning(Warning\WarningCodes::CANT_LOAD_PAGE_CONFIGURATION_FILE);
            $Basics->addWarning(Warning\WarningCodes::DEFAULT_PAGE_CONFIGURATION);

            return new self();
        }
    }

}
