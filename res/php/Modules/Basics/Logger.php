<?php

namespace REC\Modules\Basics;

use REC\Modules\Basics\Logger;
use REC\Modules\Factory;

/**
 * Instancia que proporciona métodos para llevar un registro de ejecución
 */
class Logger extends Factory\ModuleClass {

    /**
     * Alamacena todos los registros
     * @var array 
     */
    private $Logs;

    /**
     *
     * @var int 
     */
    private $TraceSteps = 3;

    /**
     * Inicialización de la instancia
     */
    public function __construct() {
        $this->Logs = [];
        parent::__construct("Hendell", "Log de las areas del programa", "Logger", 0.1);
        $this->setLog("Nuevo objeto Logger creado.");
    }

    /** Metodo que guarda un nuevo registro en la instacia
     * @param string $string Texto que se guarda (puede incluir formato) <b>Ejm: Hola %s!</b>
     * @param string $format Lista de valores que se usaran si el texto posee un formato
     */
    public function setLog($string, ...$format) {
        $trace_arr = debug_backtrace(FALSE, $this->TraceSteps);
        $trace = end($trace_arr);

        $class_name = array_key_exists('class', $trace) ? $trace['class'] : "Unknown";
        $class_function = array_key_exists('function', $trace) ? $trace['function'] : "foo";
        $class_file = array_key_exists('file', $trace) ? $trace['file'] : "default.php";
        $class_line = array_key_exists('line', $trace) ? $trace['line'] : 0;

        $this->Logs[$class_name][] = new Logger\Log(
                $class_name, $class_function, $class_file, $class_line, microtime(true), date('m/d/Y h:i:sa', time()), sprintf($string, ...$format)
        );
    }

    /**
     * Regresa un arreglo con todos los registros que posee la instancia
     * @return array Lista de registros
     */
    public function getLogs() {
        return $this->Logs;
    }

    /**
     * Regresa los registros del area espeficiada
     * @param string $class Lugar donde se guardo el registro
     * @return array|FALSE Arreglo con todos los registros del area espeficificada
     * o <b>FALSE</b> si el area no existe en los registros
     */
    public function getLog($class) {
        return (array_key_exists($class, $this->getLogs()) ? $this->Logs[$class] : FALSE);
    }

    /**
     * 
     * @return int
     */
    public function getLogCount() {
        return array_sum(array_map("count", $this->getLogs()));
    }

    /**
     * 
     * @param int $steps
     */
    public function setTraceSteps($steps) {
        $this->TraceSteps = $steps;
    }

    /**
     * 
     * @return int
     */
    public function getTraceStepts() {
        return $this->TraceSteps;
    }

}
