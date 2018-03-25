<?php

namespace REC\Modules\Extended\Database\DatabaseInstaller\InstallFiles;

use REC\Modules\Util\Functions;
use REC\Modules\Extended\Database\DatabaseInstaller;
use REC\Modules\Extended\Database\DatabaseInstaller\InstallFiles;

trait initFiles {

    public abstract static function getBaseDir();

    /**
     * 
     */
    static function init() {

        function addTable($file) {
            $Tables = DatabaseInstaller\InstallFilesArea::TABLES;

            InstallFiles::addFile($Tables, Functions::parseDir(array_merge(InstallFiles::getBaseDir(), $file)));
        }

        function addData($file) {
            $Data = DatabaseInstaller\InstallFilesArea::DATA;

            InstallFiles::addFile($Data, Functions::parseDir(array_merge(InstallFiles::getBaseDir(), $file)));
        }

        addTable(array("Tables.sql"));
        addTable(array("formats", "Complementos.sql"));
        addTable(array("formats", "Formato7.sql"));
        addTable(array("formats", "Formato8.sql"));
        addTable(array("formats", "Formato9.sql"));
        addTable(array("formats", "Formato10.sql"));
        addTable(array("formats", "Formato12.sql"));
        addTable(array("formats", "Formato14.sql"));

        addData(array("formats", "data", "Complementos.sql"));
    }

}
