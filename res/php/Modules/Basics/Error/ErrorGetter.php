<?php

namespace REC\Modules\Basics\Error;

trait ErrorGetter {

    /**
     * 
     * @param int $index
     * @return int|FALSE
     */
    public function getError($index) {
        return (array_key_exists($index, $this->getErrors()) ? $this->getErrors()[$index] : FALSE);
    }

    /**
     * 
     * @return array
     */
    public function getErrors() {
        return $this->Errors;
    }

}