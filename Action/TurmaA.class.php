<?php
//require_once 'model/TipoUsuarioM.class.php';
namespace Action;
use Model\TurmaM;

class TurmaA extends TurmaM{
    protected $sqlInsert = "insert into turma(cod_usuario,nome,sigla,ano,cod_status_turma,cod_escola,cod_registro,cod_representante) values ('%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlDelete = "delete from turma where cod_turma='%s'";
    protected $sqlDeleteLogic = "update turma set cod_status_turma = '%s' where cod_turma = '%s' ";
    protected $sqlSelect = "select * from turma where 1=1 %s %s";
    protected $sqlUpdate = "update turma set nome = '%s',sigla = '%s',ano = '%s',cod_status_turma = '%s',cod_escola = '%s',cod_registro = '%s' where cod_turma = '%s' and cod_usuario = '%s'";
     
    public function insert(){
        $sql = sprintf($this->sqlInsert,
                $this->getCodUsuario(),
                $this->getNome(),
                $this->getSigla(),
                $this->getAno(),
                $this->getCodStatusTurma(),
                 $this->getCodEscola(),
                $this->getCodRegistro(),
                $this->getCodRepresentante());
        return $this->runQuery($sql);
    }
            public function update(){
        $sql = sprintf($this->sqlUpdate,
                 $this->getCodUsuario(),
                $this->getNome(),
                $this->getSigla(),
                $this->getAno(),
                $this->getCodStatusTurma(),
                 $this->getCodEscola(),
                $this->getCodRegistro(),
                $this->getCodRepresentante(),
                $this->getCodTurma(),
                $this->getCodUsuario());
        return $this->runQuery($sql);
    }
    
    public function delete(){
        $sql = sprintf($this->sqlDelete,
                $this->getCodTurma());
        return $this->runQuery($sql);
    }
    public function deleteLogic(){
        $sql = sprintf($this->sqlDeleteLogic,
                $this->getCodStatusTurma(),
                $this->getCodTurma());
        return $this->runQuery($sql);
    }
    public function select($where='', $order=''){
        $sql = sprintf($this->sqlSelect,$where,$order);
        return $this->runSelect($sql);   
}

}