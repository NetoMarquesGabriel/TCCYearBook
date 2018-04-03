<?php

namespace Model;

use Db\DbConnection;

//require_once 'db/DbConnection.class.php';
class logM extends DbConnection {

    private $codLog;
    private $DataHoraInicioAcesso;
    private $DataHoraFimAcesso;
    private $CodStatusAcesso;
    private $CodUsuario;

    public function getCodLog() {
        return $this->codLog;
    }

    public function getDataHoraInicioAcesso() {
        return $this->DataHoraInicioAcesso;
    }

    public function getDataHoraFimAcesso() {
        return $this->DataHoraFimAcesso;
    }

    public function getCodStatusAcesso() {
        return $this->CodStatusAcesso;
    }

    public function getCodUsuario() {
        return $this->CodUsuario;
    }

    public function setCodLog($codLog) {
        $this->codLog = $codLog;
    }

    public function setDataHoraInicioAcesso($DataHoraInicioAcesso) {
        $this->DataHoraInicioAcesso = $DataHoraInicioAcesso;
    }

    public function setDataHoraFimAcesso($DataHoraFimAcesso) {
        $this->DataHoraFimAcesso = $DataHoraFimAcesso;
    }

    public function setCodStatusAcesso($CodStatusAcesso) {
        $this->CodStatusAcesso = $CodStatusAcesso;
    }

    public function setCodUsuario($CodUsuario) {
        $this->CodUsuario = $CodUsuario;
    }

}
