<?php

namespace REC\Modules\Basics\Warning;

trait WarningChecks {

    /**
     * 
     * @param int $Warning
     * @return bool
     */
    public function hasWarning($Warning) {
        return (in_array($Warning, $this->getWarnings(), TRUE));
    }

}
