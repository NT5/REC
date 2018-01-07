<?php

namespace REC\Modules\Basics;

use REC\Modules\Basics\Logger;

/**
 * Instancia que proporciona métodos para llevar un registro de ejecución
 */
class Logger implements Logger\Loggeable {

    /**
     * Alamacena todos los registros
     * @var \REC\Modules\Basics\Logger\Log[] 
     */
    private $Logs = [];

    /**
     *
     * @var int 
     */
    private $TraceSteps = 3;

    /**
     * 
     * @param string $key
     * @param array $array
     * @param string $default
     * @return mixed
     */
    private function check_array($key, $array, $default) {
        return array_key_exists($key, $array) ? $array[$key] : $default;
    }

    /** Metodo que guarda un nuevo registro en la instacia
     * @param string $string Texto que se guarda (puede incluir formato) <b>Ejm: Hola %s!</b>
     * @param string $format Lista de valores que se usaran si el texto posee un formato
     * @return Logger
     */
    public function setLog($string, ...$format) {
        $trace_arr = debug_backtrace(FALSE, $this->TraceSteps);
        $trace = end($trace_arr);

        $class_name = $this->check_array('class', $trace, "Unknown");
        $class_function = $this->check_array('function', $trace, "foo");
        $class_file = $this->check_array('file', $trace, "default.php");
        $class_line = $this->check_array('line', $trace, 0);

        $this->Logs[$class_name][] = new Logger\Log(
                $class_name, $class_function, $class_file, $class_line, microtime(true), date('m/d/Y h:i:sa', time()), sprintf($string, ...$format)
        );
        return $this;
    }

    /**
     * Regresa un arreglo con todos los registros que posee la instancia
     * @return \REC\Modules\Basics\Logger\Log[] Lista de registros
     */
    public function getLogs() {
        return $this->Logs;
    }

    /**
     * Regresa los registros del area espeficiada
     * @param string $class Lugar donde se guardo el registro
     * @param int $index Index del log dentro del array
     * @return array|FALSE Arreglo con todos los registros del area espeficificada
     * o <b>FALSE</b> si el area no existe en los registros
     */
    public function getLog($class, $index = NULL) {
        return (array_key_exists($class, $this->getLogs()) ? ($index === NULL ? $this->Logs[$class] : $this->Logs[$class][$index] ) : FALSE);
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
     * @return Logger
     */
    public function setTraceSteps($steps) {
        $this->TraceSteps = $steps;
        return $this;
    }

    /**
     * 
     * @return int
     */
    public function getTraceStepts() {
        return $this->TraceSteps;
    }

    /**
     * 
     * @return Logger
     */
    public function getLogger() {
        return $this;
    }

}
