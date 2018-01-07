<?php

namespace REC\Modules\Basics\Warning;

/**
 * @todo Documentacion
 */
interface ThrowableWarning {

    /**
     * 
     * @return \REC\Modules\Basics\Warnings
     */
    public function getWarningSet();

    /**
     * 
     * @param int $Warning
     * @return \REC\Modules\Basics\Warnings
     * @throws \Exception
     */
    public function addWarning($Warning);

    /**
     * 
     * @param int $Warning
     * @return bool
     */
    public function hasWarning($Warning);

    /**
     * 
     * @return array
     */
    public function getWarnings();
}
