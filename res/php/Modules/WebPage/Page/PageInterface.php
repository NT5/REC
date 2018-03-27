<?php

namespace REC\Modules\WebPage\Page;

/**
 * 
 */
interface PageInterface {

    public function CheckPost();

    public function initVars();

    public function initTwigTemplate();
}
