<?php

namespace Model;

use Db\DbConnection;

//require_once 'db/DbConnection.class.php';
class UsuarioM extends DbConnection {

    private $codUsuario;
    private $emailUsuario;
    private $senhaUsuario;
    private $nomeUsuario;
    private $codStatusUsuario;

    public function getCodUsuario() {
        return $this->codUsuario;
    }

    public function getEmailUsuario() {
        return $this->emailUsuario;
    }

    public function getSenhaUsuario() {
        return $this->senhaUsuario;
    }

    public function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    public function getCodStatusUsuario() {
        return $this->codStatusUsuario;
    }

    public function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    public function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario;
    }

    public function setSenhaUsuario($senhaUsuario) {
        $this->senhaUsuario = $senhaUsuario;
    }

    public function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }

    public function setCodStatusUsuario($codStatusUsuario) {
        $this->codStatusUsuario = $codStatusUsuario;
    }

}
