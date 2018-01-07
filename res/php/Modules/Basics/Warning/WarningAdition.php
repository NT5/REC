<?php

namespace REC\Modules\Basics\Warning;

trait WarningAdition {

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

}
