<?php

namespace Model;

use Db\DbConnection;

//require_once 'db/DbConnection.class.php';
class MidiaM extends DbConnection {

    private $CodMidia;
    private $codUsuario;
    private $url;
    private $tipoMidia;
    private $codStatusMidia;
    
    public function getCodMidia() {
        return $this->CodMidia;
    }

    public function getCodUsuario() {
        return $this->codUsuario;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getTipoMidia() {
        return $this->tipoMidia;
    }

    public function getCodStatusMidia() {
        return $this->codStatusMidia;
    }

    public function setCodMidia($CodMidia) {
        $this->CodMidia = $CodMidia;
    }

    public function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setTipoMidia($tipoMidia) {
        $this->tipoMidia = $tipoMidia;
    }

    public function setCodStatusMidia($codStatusMidia) {
        $this->codStatusMidia = $codStatusMidia;
    }



}