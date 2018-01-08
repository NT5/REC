<?php

namespace REC\Modules\Basics\Logger;

/**
 * @TODO Documentacion
 */
interface Loggeable {

    /**
     * 
     * @param int $steps
     * @return Logger
     */
    public function setLoggerTraceSteps($steps);

    /**
     * 
     * @return int
     */
    public function getLoggerTraceStepts();

    /**
     * @param string $string
     * @param string $format
     */
    public function setLog($string, ...$format);

    /**
     * 
     * @param string $class
     * @param int $index
     */
    public function getLog($class, $index = NULL);

    /**
     * 
     * @return \REC\Modules\Basics\Logger\Log[] Lista de registros
     */
    public function getLogs();

    /**
     * 
     * @return int
     */
    public function getLogCount();
}
