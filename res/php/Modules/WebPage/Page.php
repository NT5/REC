<?php

namespace REC\Modules\WebPage;

use REC\Modules\Util\Functions;
use REC\Modules\Extended;
use REC\Modules\Extended\ExtendedExtended;
use REC\Modules\WebPage\Twig;
use REC\Modules\WebPage\Page\PageInterface;

/**
 * @todo Documentar
 */
abstract class Page extends ExtendedExtended implements PageInterface {

    /**
     *
     * @var string 
     */
    private $Page_Title;

    /**
     *
     * @var string 
     */
    private $Page_Template;

    /**
     *
     * @var Twig 
     */
    private $Twig;

    /**
     * 
     * @param Extended $Extended
     * @param sring $Page_Title
     * @param string $Page_Template
     * @param Twig $Twig_Class
     */
    public function __construct(Extended $Extended = NULL, $Page_Title = NULL, $Page_Template = NULL, Twig $Twig_Class = NULL) {
        parent::__construct($Extended);

        $this->Page_Title = ($Page_Title) ? : "Default";
        $this->Page_Template = ($Page_Template) ? : "base.twig";

        $this->Twig = ($Twig_Class) ? : new Twig();

        $this->setFilters();
    }

    /**
     * 
     */
    private function setFilters() {
        $Twig = $this->getTwig();

        $Twig->addFilter('integerToRoman', function ($number) {
            return Functions::integerToRoman($number);
        });
    }

    /**
     * 
     * @param string $vars
     */
    public function setVars($vars) {
        $this->getTwig()->setVars($vars);
    }

    /**
     * 
     * @param string $name
     * @param string $value
     */
    public function setVar($name, $value) {
        $this->getTwig()->setVar($name, $value);
    }

    /**
     * 
     * @param string $template
     */
    public function setTemplate($template) {
        $this->getTwig()->setTemplate($template);
    }

    /**
     * 
     * @return string
     */
    public function display() {
        return $this->getTwig()->getRender();
    }

    /**
     * 
     * @return Twig
     */
    public function getTwig() {
        return $this->Twig;
    }

    /**
     * 
     * @return array
     */
    public function getPost() {
        $POST = filter_input_array(INPUT_POST);
        return $POST;
    }

    /**
     * 
     * @return string
     */
    public function getPageTitle() {
        return $this->Page_Title;
    }

    /**
     * 
     * @return string
     */
    public function getPageTemplate() {
        return $this->Page_Template;
    }

    /**
     * 
     * @param string $Page_title
     */
    public function setPageTitle($Page_title) {
        $this->Page_Title = $Page_title;
    }

    /**
     * 
     * @param string $Page_template
     */
    public function setPageTemplate($Page_template) {
        $this->Page_Template = $Page_template;
    }

}
