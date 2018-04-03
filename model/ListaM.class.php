<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;
use Db\DbConnection;

class ListaM extends DbConnection {
    private $codTurma;
    private $codUsuario;
    private $codLista;
    private $codStatusLista;
    private $nomeUsuario;
    
    public function getCodTurma() {
        return $this->codTurma;
    }

    public function getCodUsuario() {
        return $this->codUsuario;
    }

    public function getCodLista() {
        return $this->codLista;
    }

    public function getCodStatusLista() {
        return $this->codStatusLista;
    }

    public function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    public function setCodTurma($codTurma) {
        $this->codTurma = $codTurma;
    }

    public function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    public function setCodLista($codLista) {
        $this->codLista = $codLista;
    }

    public function setCodStatusLista($codStatusLista) {
        $this->codStatusLista = $codStatusLista;
    }

    public function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }




}
