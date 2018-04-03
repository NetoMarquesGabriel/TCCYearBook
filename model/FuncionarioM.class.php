<?php

namespace Model;

use Db\DbConnection;

//require_once 'db/DbConnection.class.php';
class FuncionarioM extends DbConnection {
    
    private $codEscola;
    private $codFuncionario;
    private $nomeFuncionario;
    private $codStatusFuncionario;
    private $cargo;
    private $url;
    public function getCodEscola() {
        return $this->codEscola;
    }

    public function getCodFuncionario() {
        return $this->codFuncionario;
    }

    public function getNomeFuncionario() {
        return $this->nomeFuncionario;
    }

    public function getCodStatusFuncionario() {
        return $this->codStatusFuncionario;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setCodEscola($codEscola) {
        $this->codEscola = $codEscola;
    }

    public function setCodFuncionario($codFuncionario) {
        $this->codFuncionario = $codFuncionario;
    }

    public function setNomeFuncionario($nomeFuncionario) {
        $this->nomeFuncionario = $nomeFuncionario;
    }

    public function setCodStatusFuncionario($codStatusFuncionario) {
        $this->codStatusFuncionario = $codStatusFuncionario;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function setUrl($url) {
        $this->url = $url;
    }






    
}
