<?php

namespace Model;

use Db\DbConnection;

//require_once 'db/DbConnection.class.php';
class TipoUsuarioM extends DbConnection {

    private $codTipoUsuario;
    private $nomeTipoUsuario;
    private $codStatusTipoUsuario;
    private $codUsuario;
    

    public function getCodTipoUsuario() {
        return $this->codTipoUsuario;
    }

    public function getNomeTipoUsuario() {
        return $this->nomeTipoUsuario;
    }

    public function getCodStatusTipoUsuario() {
        return $this->codStatusTipoUsuario;
    }

    public function getCodUsuario() {
        return $this->codUsuario;
    }

    public function setCodTipoUsuario($codTipoUsuario) {
        $this->codTipoUsuario = $codTipoUsuario;
    }

    public function setNomeTipoUsuario($nomeTipoUsuario) {
        $this->nomeTipoUsuario = $nomeTipoUsuario;
    }

    public function setCodStatusTipoUsuario($codStatusTipoUsuario) {
        $this->codStatusTipoUsuario = $codStatusTipoUsuario;
    }

    public function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }


}
