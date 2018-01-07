<?php

namespace REC\Modules\Basics\Error;

trait ErrorAdition {

    /**
     * 
     * @param int $Error
     * @return \REC\Modules\Basics\Errors
     * @throws \Exception
     */
    public function addError($Error) {
        if (is_int($Error)) {
            $this->Errors[] = $Error;
            return $this;
        }
        throw new \Exception("No valid value");
    }

}
