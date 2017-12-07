<?php

namespace REC\Modules\Factory;

interface ModuleInterface {

    public function getModuleName();

    public function getModuleAuthor();

    public function getModuleDescription();

    public function getModuleVersion();
}
