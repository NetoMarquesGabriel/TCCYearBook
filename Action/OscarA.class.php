<?php
//require_once 'model/LogM.class.php';
namespace Action;
use Model\OscarM;

class OscarA extends OscarM {
    protected $sqlInsert = "insert into oscar(cod_aluno,titulo,cod_turma,cod_status_oscar) values ('%s','%s','%s','%s')";
    protected $sqlDelete = "delete from oscar where cod_oscar='%s'";
    protected $sqlSelect = "select * from oscar where 1=1 %s %s";
    protected $sqlUpdate = "update oscar set cod_aluno = '%s',titulo = '%s',cod_turma = '%s' cod_status_oscar = '%s' where cod_oscar = '%s'";
    protected $sqlDeleteLogic = "update oscar set cod_status_oscar = '%s' where cod_oscar = '%s'";
   
    
    public function insert(){
        $sql = sprintf($this->sqlInsert,
                $this->getCodAluno(),
                $this->getTitulo(),
                $this->getCodTurma(),
                $this->getCodStatusOscar());
      return $this->runQuery($sql);
    }
    public function update(){
        $sql = sprintf($this->sqlUpdate,
                $this->getCodAluno(),
                $this->getTitulo(),
                $this->getCodTurma(),
                $this->getCodStatusOscar(),
                $this->getCodOscar());
      return   $this->runQuery($sql);
    }
    public function deleteLogic(){
         $sql = sprintf($this->deleteLogic,
               $this->getCodStatusOscar(),
               $this->getCodOscar());
      return   $this->runQuery($sql);
    }

    public function delete(){
        $sql = sprintf($this->sqlDelete,
        $this->getCodOscar());
      return   $this->runQuery($sql);
    }
     
    public function select($where='', $order=''){
        $sql = sprintf($this->sqlSelect,$where,$order);
        return $this->runSelect($sql);   
    }
}