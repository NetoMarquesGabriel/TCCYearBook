<?php
//require_once 'model/FeedM.class.php';
namespace Action;
use Model\ListaM;

class ListaA extends ListaM {
    protected $sqlInsert = "insert into lista(cod_turma,cod_usuario,cod_status_lista,nome_usuario) values ('%s','%s','%s','%s')";
    protected $sqlDelete = "delete from lista where cod_lista='%s'";
    protected $sqlSelect = "select * from lista where 1=1 %s %s";
    protected $sqlUpdate = "update lista set cod_turma = '%s', cod_usuario = '%s' where cod_lista = '%s'";
  
    
    public function insert(){
        $sql = sprintf($this->sqlInsert,
                $this->getCodTurma(),
                $this->getCodUsuario(),
                $this->getCodStatusLista(),
                $this->getNomeUsuario());
        return $this->runQuery($sql);
    }
            public function update(){
        $sql = sprintf($this->sqlUpdate,
                $this->getCodTurma(),
                $this->getCodUsuario(),
                $this->getCodStatusLista(),
                $this->getNomeUsuario(),
                $this->getCodLista());
        return $this->runQuery($sql);
    }
    
    public function delete(){
        $sql = sprintf($this->sqlDelete,
                $this->getCodLista());
        return $this->runQuery($sql);
    }
    public function select($where='', $order=''){
        $sql = sprintf($this->sqlSelect,$where,$order);
        return $this->runSelect($sql);   
    }
}