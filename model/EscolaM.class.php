<?php

namespace Model;

use Db\DbConnection;

//require_once 'db/DbConnection.class.php';
class EscolaM extends DbConnection {

    private $codEscola;
    private $codUsuario;
    private $codStatusEscola;
    private $nomeEscola;
    private $codRegistro;
    private $texto;
    public function getCodEscola() {
        return $this->codEscola;
    }

    public function getCodUsuario() {
        return $this->codUsuario;
    }

    public function getCodStatusEscola() {
        return $this->codStatusEscola;
    }

    public function getNomeEscola() {
        return $this->nomeEscola;
    }

    public function getCodRegistro() {
        return $this->codRegistro;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function setCodEscola($codEscola) {
        $this->codEscola = $codEscola;
    }

    public function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    public function setCodStatusEscola($codStatusEscola) {
        $this->codStatusEscola = $codStatusEscola;
    }

    public function setNomeEscola($nomeEscola) {
        $this->nomeEscola = $nomeEscola;
    }

    public function setCodRegistro($codRegistro) {
        $this->codRegistro = $codRegistro;
    }

    public function setTexto($texto) {
        $this->texto = $texto;
    }






}
