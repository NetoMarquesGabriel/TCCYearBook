<?php

namespace Model;

use Db\DbConnection;

//require_once 'db/DbConnection.class.php';
class TurmaM extends DbConnection {

    private $codTurma;
    private $codUsuario;
    private $nome;
    private $sigla;
    private $ano;
    private $codStatusTurma;
    private $codEscola;
    private $codRegistro;
    private $codRepresentante;
    public function getCodTurma() {
        return $this->codTurma;
    }

    public function getCodUsuario() {
        return $this->codUsuario;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSigla() {
        return $this->sigla;
    }

    public function getAno() {
        return $this->ano;
    }

    public function getCodStatusTurma() {
        return $this->codStatusTurma;
    }

    public function getCodEscola() {
        return $this->codEscola;
    }

    public function getCodRegistro() {
        return $this->codRegistro;
    }

    public function getCodRepresentante() {
        return $this->codRepresentante;
    }

    public function setCodTurma($codTurma) {
        $this->codTurma = $codTurma;
    }

    public function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSigla($sigla) {
        $this->sigla = $sigla;
    }

    public function setAno($ano) {
        $this->ano = $ano;
    }

    public function setCodStatusTurma($codStatusTurma) {
        $this->codStatusTurma = $codStatusTurma;
    }

    public function setCodEscola($codEscola) {
        $this->codEscola = $codEscola;
    }

    public function setCodRegistro($codRegistro) {
        $this->codRegistro = $codRegistro;
    }

    public function setCodRepresentante($codRepresentante) {
        $this->codRepresentante = $codRepresentante;
    }






}
