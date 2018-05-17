<?php

namespace REC\Application\Web\init;

use REC\Modules\Basics;

trait initBasics {

    /**
     *
     * @var Basics
     */
    private $Basics;

    /**
     * 
     * @return Basics
     */
    public abstract function getBasics();

    private function initBasics() {
        $Basics = new Basics();

        $this->Basics = $Basics;
    }

    /**
     * @return \REC\Modules\Basics\Logger\Log[] Lista de registros
     */
    public function getLogs() {
        return $this->getBasics()->getLogs();
    }

}
