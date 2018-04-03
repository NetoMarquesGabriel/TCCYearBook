<?php

namespace Model;

use Db\DbConnection;

//require_once 'db/DbConnection.class.php';
class AlunoM extends DbConnection {

    private $codAluno;
    private $apelido;
    private $frase;
    private $textoFeed;
    private $dataNasc;
    private $codStatusAluno;
    private $codUsuario;
    private $redesSociais;
    private $codTurma;
    
    public function getCodAluno() {
        return $this->codAluno;
    }

    public function getApelido() {
        return $this->apelido;
    }

    public function getFrase() {
        return $this->frase;
    }

    public function getTextoFeed() {
        return $this->textoFeed;
    }

    public function getDataNasc() {
        return $this->dataNasc;
    }

    public function getCodStatusAluno() {
        return $this->codStatusAluno;
    }

    public function getCodUsuario() {
        return $this->codUsuario;
    }

    public function getRedesSociais() {
        return $this->redesSociais;
    }

    public function getCodTurma() {
        return $this->codTurma;
    }

    public function setCodAluno($codAluno) {
        $this->codAluno = $codAluno;
    }

    public function setApelido($apelido) {
        $this->apelido = $apelido;
    }

    public function setFrase($frase) {
        $this->frase = $frase;
    }

    public function setTextoFeed($textoFeed) {
        $this->textoFeed = $textoFeed;
    }

    public function setDataNasc($dataNasc) {
        $this->dataNasc = $dataNasc;
    }

    public function setCodStatusAluno($codStatusAluno) {
        $this->codStatusAluno = $codStatusAluno;
    }

    public function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    public function setRedesSociais($redesSociais) {
        $this->redesSociais = $redesSociais;
    }

    public function setCodTurma($codTurma) {
        $this->codTurma = $codTurma;
    }





}

