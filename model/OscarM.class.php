<?php

namespace Model;

use Db\DbConnection;

//require_once 'db/DbConnection.class.php';
class OscarM extends DbConnection {
    private $codOscar;
    private $codAluno;
    private $titulo;
    private $codTurma;
    private $codStatusOscar;
    public function getCodOscar() {
        return $this->codOscar;
    }

    public function getCodAluno() {
        return $this->codAluno;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getCodTurma() {
        return $this->codTurma;
    }

    public function getCodStatusOscar() {
        return $this->codStatusOscar;
    }

    public function setCodOscar($codOscar) {
        $this->codOscar = $codOscar;
    }

    public function setCodAluno($codAluno) {
        $this->codAluno = $codAluno;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setCodTurma($codTurma) {
        $this->codTurma = $codTurma;
    }

    public function setCodStatusOscar($codStatusOscar) {
        $this->codStatusOscar = $codStatusOscar;
    }



}
