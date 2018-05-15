<?php

namespace REC\Application;

use REC\Application\Web\init;

class Web {

    use init\initRoute,
        init\initBasics,
        init\initExtended;

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

    public function app() {
        $this->initBasics();
        $this->initExtended();
        $this->initRoute();
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
