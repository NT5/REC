<?php

namespace REC\Application\Web;

use REC\Pages;
use REC\Modules\WebPage\Page;
use REC\Modules\Extended\ExtendedExtended;
use REC\Modules\Extended;

class WebRoute extends ExtendedExtended {

    /**
     *
     * @var Page
     */
    private static $Page;

    /**
     *
     * @var string
     */
    private $PagaClass;

    /**
     *
     * @var string
     */
    private $Url;

    /**
     *
     * @var array
     */
    private $Route = [];

    /**
     * 
     * @param string $Url
     * @param string $PageClass
     * @param Extended $Extended
     */
    public function __construct($Url = 'p', $PageClass = Pages\Home::class, Extended $Extended = NULL) {
        parent::__construct($Extended);

        $this->Url = $Url;
        $this->PagaClass = $PageClass;
    }

    /**
     * 
     * @param \REC\Application\Web\WebRoute $Route
     * @return \REC\Application\Web\WebRoute
     */
    public function addRoute(WebRoute $Route) {
        $b = $this->Extended()->Basics();

        $this->Route[$Route->getUrl()] = $Route;
        $b->setLog("Nuevo Route añadido URL: %s | PageClass: %s", $Route->getUrl(), $Route->getPageClass());
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getUrl() {
        return $this->Url;
    }

    /**
     * 
     * @return string
     */
    public function getPageClass() {
        return $this->PagaClass;
    }

    /**
     * 
     * @return array
     */
    public function getRoutes() {
        return $this->Route;
    }

    /**
     * 
     * @param string $name
     * @return WebRoute
     */
    public function getRoute($name) {
        return (array_key_exists($name, $this->getRoutes()) ? $this->getRoutes()[$name] : NULL);
    }

    /**
     * 
     * @return Page
     */
    public static function getPage() {
        return self::$Page;
    }

    /**
     * 
     * @return \REC\Application\Web\WebRoute
     */
    public function init() {
        $b = $this->Extended()->Basics();
        $b->setLog("[%s] Init webroute...", $this->getPageClass());

        $url = filter_input(INPUT_GET, $this->getUrl());
        $Route = $this->getRoutes();

        if (array_key_exists($url, $Route)) {
            $Route[$url]->init();
        } else {

            if (!self::getPage()) {
                $b->setLog("No pageclass found, create new");
            } else {
                $b->setLog("Pageclass found %s, overwrite...", self::getPage()->getPageTitle());
            }

            $PageClass = $this->getPageClass();
            self::$Page = new $PageClass($this->Extended());

            $b->setLog("WebRoute init! working Page: %s", $this->getPageClass());
        }
        return $this;
    }

}
