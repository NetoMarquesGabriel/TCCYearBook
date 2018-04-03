<?php
//require_once 'model/LogM.class.php';
namespace Action;
use Model\LogM;

class LogA extends LogM {
    protected $sqlInsert = "insert into log(data_hora_inicio_acesso,cod_status_acesso,cod_usuario) values ('%s','%s','%s')";
    protected $sqlDelete = "delete from log where cod_log='%s'";
    protected $sqlSelect = "select * from log where 1=1 %s %s";
    protected $sqlUpdate = "update log set data_hora_inicio_acesso = '%s',data_hora_fim_acesso = '%s',cod_status_acesso = '%s' where cod_usuario = '%s' and cod_log = '%s'";
    protected $sqlDeleteLogic = "update log set cod_status_acesso = '%s' where cod_log = '%s'";
    protected $sqlLogout = "update log set data_hora_fim_acesso = '%s' where cod_log = '%s'";
    
    public function insert(){
        $sql = sprintf($this->sqlInsert,
                $this->getDataHoraInicioAcesso(),
                $this->getCodStatusAcesso(),
                $this->getCodUsuario());
      return $this->runQuery($sql);
    }
    public function update(){
        $sql = sprintf($this->sqlUpdate,
                $this->getDataHoraInicioAcesso(),
                $this->getDataHoraFimAcesso(),
                $this->getCodStatusAcesso(),
                $this->getCodUsuario(),
                $this->getCodLog());
      return   $this->runQuery($sql);
    }
    public function deleteLogic(){
         $sql = sprintf($this->deleteLogic,
               $this->getCodStatusAcesso(),
               $this->getCodLog());
      return   $this->runQuery($sql);
    }

    public function delete(){
        $sql = sprintf($this->sqlDelete,
        $this->getCodLog());
      return   $this->runQuery($sql);
    }
     
    public function select($where='', $order=''){
        $sql = sprintf($this->sqlSelect,$where,$order);
        return $this->runSelect($sql);   
    }
    public function Logout(){
         $sql = sprintf($this->sqlLogout,
               $this->getDataHoraFimAcesso(),
               $this->getCodLog());
      return   $this->runQuery($sql);
    }
}