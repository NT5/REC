<?php

namespace REC\Modules\Basics;

use REC\Modules\Basics\Warning;

/**
 * @todo Documentacion
 */
class Warnings implements Warning\ThrowableWarning {

    /**
     *
     * @var array
     */
    private $Warnings = [];

    /**
     * 
     * @param int $Warning
     * @return \REC\Modules\Basics\Warnings
     * @throws \Exception
     */
    public function addWarning($Warning) {
        if (is_int($Warning)) {
            $this->Warnings[] = $Warning;
            return $this;
        }
        throw new \Exception("No valid value");
    }

    /**
     * 
     * @return array
     */
    public function getWarnings() {
        return $this->Warnings;
    }

    /**
     * 
     * @param int $Warning
     * @return bool
     */
    public function hasWarning($Warning) {
        return (in_array($Warning, $this->getWarnings(), TRUE));
    }

    /**
     * 
     * @return \REC\Modules\Basics\Warnings
     */
    public function getWarningSet() {
        return $this;
    }

}
