<?php

namespace REC\Modules\Factory;

use REC\Modules\Factory;

class ModuleClass implements Factory\ModuleInterface {

    /**
     *
     * @var string
     */
    private $ModuleAuthor;

    /**
     *
     * @var string
     */
    private $ModuleDescription;

    /**
     *
     * @var string
     */
    private $ModuleName;

    /**
     *
     * @var string
     */
    private $ModuleVersion;

    /**
     * 
     * @param string $ModuleAuthor
     * @param string $ModuleDescription
     * @param string $ModuleName
     * @param string $ModuleVersion
     */
    public function __construct($ModuleAuthor, $ModuleDescription, $ModuleName, $ModuleVersion) {
        $this->ModuleAuthor = $ModuleAuthor;
        $this->ModuleDescription = $ModuleDescription;
        $this->ModuleName = $ModuleName;
        $this->ModuleVersion = $ModuleVersion;
    }

    /**
     * 
     * @return string
     */
    public function getModuleAuthor() {
        return $this->ModuleAuthor;
    }

    /**
     * 
     * @return string
     */
    public function getModuleDescription() {
        return $this->ModuleDescription;
    }

    /**
     * 
     * @return string
     */
    public function getModuleName() {
        return $this->ModuleName;
    }

    /**
     * 
     * @return string
     */
    public function getModuleVersion() {
        return $this->ModuleVersion;
    }

}
