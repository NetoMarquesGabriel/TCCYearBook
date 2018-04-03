<?php
//require_once 'model/TipoUsuarioM.class.php';
namespace Action;
use Model\FuncionarioM;

class FuncionarioA extends FuncionarioM{
    protected $sqlInsert = "insert into funcionario(cod_escola,nome,cod_status_funcionario,cargo,url) values ('%s','%s','%s','%s','%s')";
    protected $sqlDelete = "delete from funcionario where cod_funcionario = '%s'";
    protected $sqlSelect = "select * from funcionario where 1=1 %s %s";
    protected $sqlUpdate = "update funcionario set nome = '%s',cod_status_funcionario = '%s',cargo = '%s',url = '%s' where cod_funcionario = '%s' and cod_escola = '%s'";
     
    public function insert(){
        $sql = sprintf($this->sqlInsert,
            $this->getCodEscola(),
            $this->getNomeFuncionario(),
            $this->getCodStatusFuncionario(),
            $this->getCargo(),
            $this->getUrl());
        return $this->runQuery($sql);
    }
            public function update(){
        $sql = sprintf($this->sqlUpdate,
            $this->getNomeFuncionario(),
            $this->getCodStatusFuncionario(),
            $this->getCargo(),
            $this->getUrl(),
            $this->getCodFuncionario(),
            $this->getCodEscola());
        return $this->runQuery($sql);
            }
    
    public function delete(){
        $sql = sprintf($this->sqlDelete,
                $this->getCodFuncionario());
        return $this->runQuery($sql);
    }
    public function select($where='', $order=''){
        $sql = sprintf($this->sqlSelect,$where,$order);
        return $this->runSelect($sql);   
}

}
