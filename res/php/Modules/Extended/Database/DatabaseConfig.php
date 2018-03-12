<?php

namespace REC\Modules\Extended\Database;

use REC\Modules;
use REC\Modules\Extended\Database\DatabaseConfig;

/**
 * @todo Documendar
 * Instancia abstracta usada para almacenar y cargar
 * datos de configuración de la base de datos
 */
class DatabaseConfig implements DatabaseConfig\DatabaseConfigInterface {

    use DatabaseConfig\saveToIni,
        DatabaseConfig\fromIniFile;

    /**
     *
     * @var Modules\Basics 
     */
    private $Basics;

    /**
     * @var string Dirección del servidor de la base de datos
     */
    private $server;

    /**
     * @var string Nombre de usuario de la base de datos 
     */
    private $username;

    /**
     * @var string Contraseña de conexion 
     */
    private $password;

    /**
     * @var string Base de datos que se usara
     */
    private $database;

    /**
     * Regresa instancia de configuración de la base de datos
     * @param string $server Dirección del servidor de la base de datos
     * @param string $username Nombre de usuario de la base de datos
     * @param string $password Contraseña de conexion
     * @param string $database Base de datos que se usara
     * @param Modules\Basics $Basics
     */
    public function __construct($server = NULL, $username = NULL, $password = NULL, $database = NULL, Modules\Basics $Basics = NULL) {
        $this->Basics = ($Basics) ? : new Modules\Basics();

        $this->server = ($server) ? : "localhost";
        $this->username = ($username) ? : "default";
        $this->password = ($password) ? : "default";
        $this->database = ($database) ? : "uml_rec";

        $this->Basics()->setLog("Nueva instancia de configuración de base de datos creada");
    }

    /**
     * 
     * @return Modules\Basics
     */
    public function Basics() {
        return $this->Basics;
    }

    /**
     * 
     * @return string
     */
    public function getServer() {
        return $this->server;
    }

    /**
     * 
     * @return string
     */
    public function getUserName() {
        return $this->username;
    }

    /**
     * 
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * 
     * @return string
     */
    public function getDatabase() {
        return $this->database;
    }

    /**
     * 
     * @param string $server
     */
    public function setServer($server = 'localhost') {
        $this->server = $server;
    }

    /**
     * 
     * @param string $username
     */
    public function setUserName($username = 'default') {
        $this->username = $username;
    }

    /**
     * 
     * @param string $password
     */
    public function setPassword($password = 'default') {
        $this->password = $password;
    }

    /**
     * 
     * @param string $database
     */
    public function setDatabase($database = 'uml_rec') {
        $this->database = $database;
    }

}
