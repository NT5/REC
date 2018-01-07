<?php

namespace REC\Modules\Basics\Error;

trait ErrorChecks {

    /**
     * 
     * @param int $Error
     * @return bool
     */
    public function hasError($Error) {
        return (in_array($Error, $this->getErrors(), TRUE));
    }

}
