<?php

namespace REC\Application;

use REC\Application\Web\init;
use REC\Application\Web\WebRoute;
use REC\Modules\Basics;
use REC\Modules\Extended;

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

    /**
     * 
     * @return \REC\Application\Web
     */
    public function app() {
        $this->initBasics();
        $this->initExtended();
        $this->initRoute();

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
