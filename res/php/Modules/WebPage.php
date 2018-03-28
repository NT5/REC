<?php

namespace REC\Modules;

use REC\Pages;
use REC\Modules\Extended;
use REC\Modules\WebPage\Page;
use REC\Modules\WebPage\Twig;
use REC\Modules\Extended\ExtendedExtended;
use REC\Modules\Util\Functions;

class WebPage extends ExtendedExtended {

    /**
     *
     * @var int 
     */
    private $Listen_Type;

    /**
     *
     * @var string 
     */
    private $Listen_Url;

    /**
     *
     * @var Page
     */
    private $Page;

    /**
     * 
     * @param int $ListenType
     * @param string $ListenUrl
     * @param Extended $Extended
     */
    public function __construct($ListenType = NULL, $ListenUrl = NULL, Extended $Extended = NULL) {
        parent::__construct($Extended);

        $this->Listen_Type = ($ListenType) ? : INPUT_GET;
        $this->Listen_Url = ($ListenUrl) ? : 'p';

        $this->Basics()->setLog("Nueva instancia controladora de página creada");
    }

    /**
     * 
     * @return int
     */
    public function getListenType() {
        return $this->Listen_Type;
    }

    /**
     * 
     * @return string
     */
    public function getListenUrl() {
        return $this->Listen_Url;
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
     * @param Page $Page
     */
    private function setPage(Page $Page) {
        $this->Page = $Page;
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
     * @return WebPage
     */
    public function initPage() {
        $Page = NULL;

        $url_page = filter_input($this->getListenType(), $this->getListenUrl());

        switch ($url_page) {
            case "inicio":
            default:
                $Page = new Pages\Home($this->Extended());
                break;
        }
        $this->setPage($Page);

        $this->initVars();

        return $this;
    }

    /**
     * 
     */
    private function initVars() {
        $Twig = $this->getTwig();
        $PageConfig = $this->Extended()->PageConfig();

        $Twig->setVars([
            'rec.page.title' => Functions::strFormat("%config_title | %config_var", array(
                'config_title' => $PageConfig->getPageTitle(),
                'config_var' => $Twig->getVar('rec.page.title')
            ))
        ]);
    }

}
