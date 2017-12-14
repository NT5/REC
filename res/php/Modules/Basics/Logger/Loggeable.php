<?php

namespace REC\Modules\Basics\Logger;

/**
 * @TODO Documentacion
 */
interface Loggeable {

    /**
     * 
     * @return \REC\Modules\Logger
     */
    public function getLogger();

    /**
     * @param string $string
     * @param string $format
     */
    public function setLog($string, ...$format);
}
