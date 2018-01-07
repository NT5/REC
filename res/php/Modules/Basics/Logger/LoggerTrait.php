<?php

namespace REC\Modules\Basics\Logger;

trait LoggerTrait {

    use LoggerAdition,
        LoggerGetter;

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
