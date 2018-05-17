<?php

namespace REC\Application\Web;

use REC\Pages;
use REC\Modules\WebPage\Page;
use REC\Modules\WebPage\Twig;
use REC\Modules\Extended\ExtendedExtended;
use REC\Modules\Extended;

class WebRoute extends ExtendedExtended {

    /**
     *
     * @var Page
     */
    private $Page;

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
        $this->Route[$Route->getUrl()] = $Route;
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
    public function getPage() {
        return $this->Page;
    }

    /**
     * 
     * @return Twig
     */
    public function getTwig() {
        $Page = $this->getPage();
        return ($Page ? $Page->getTwig() : NULL);
    }

    /**
     * 
     * @return WebPage
     */
    public function display() {
        $Page = $this->getPage();

        echo ($Page ? $Page->display() : "No page class found");

        return $this;
    }

    /**
     * 
     * @return \REC\Application\Web\WebRoute
     */
    public function init() {
        $url = filter_input(INPUT_GET, $this->getUrl());
        $Route = $this->getRoutes();

        if (array_key_exists($url, $Route)) {
            $Route[$url]->init();
        } else {
            $PageClass = $this->PagaClass;
            $this->Page = new $PageClass($this->Extended());

            // $this->display();
        }
        return $this;
    }

}
