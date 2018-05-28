<?php

namespace REC\Application;

use REC\Application\Web\init;
use REC\Application\Web\dispose;
use REC\Application\Web\WebRoute;
use REC\Modules\Basics;
use REC\Modules\Extended;

class Web {

    use init\initRoute,
        init\initDisplay,
        init\initBasics,
        init\initExtended,
        dispose\disposeExtended;

    /**
     * @var float Guarda el tiempo de ejecución en milisegundos
     */
    private $ExecutionTime = 0;

    /**
     *
     * @var Basics
     */
    private $Basics;

    /**
     *
     * @var Extended
     */
    private $Extended;

    /**
     *
     * @var WebRoute
     */
    private $Route;

    /**
     * 
     * @return \REC\Application\Web
     */
    public function app() {
        $this->ExecutionTime = microtime(true);

        $this->initBasics();
        $this->initExtended();
        $this->initRoute();

        $this->disposeExtended();

        $this->initDisplay();
        return $this;
    }

    /**
     * 
     * @return WebRoute
     */
    public function getRoute() {
        return $this->Route;
    }

    /**
     * 
     * @return Basics
     */
    public function getBasics() {
        return $this->Basics;
    }

    /**
     * 
     * @return Extended
     */
    public function getExtended() {
        return $this->Extended;
    }

}
