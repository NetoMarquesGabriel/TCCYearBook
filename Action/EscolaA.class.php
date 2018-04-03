<?php
//require_once 'model/TipoUsuarioM.class.php';
namespace Action;
use Model\EscolaM;

class EscolaA extends EscolaM{
    protected $sqlInsert = "insert into escola(cod_usuario,cod_status_escola,cod_registro,texto) values ('%s','%s','%s','%s')";
    protected $sqlDelete = "delete from escola where cod_escola='%s'";
    protected $sqlSelect = "select * from escola where 1=1 %s %s";
    protected $sqlUpdate = "update escola set cod_status_escola = '%s',cod_registro = '%s',texto = '%s' where cod_escola = '%s' and cod_usuario = '%s'";
     
    public function insert(){
        $sql = sprintf($this->sqlInsert,
                $this->getCodUsuario(),
                $this->getCodStatusEscola(),
                $this->getCodRegistro(),
                $this->getTexto());
        return $this->runQuery($sql);
    }
            public function update(){
        $sql = sprintf($this->sqlUpdate,
                $this->getCodUsuario(),
                $this->getCodStatusEscola(),
                $this->getCodRegistro(),
                $this->getTexto(),
                $this->getCodEscola(),
                $this->getCodUsuario());
        return $this->runQuery($sql);
    }
    
    public function delete(){
        $sql = sprintf($this->sqlDelete,
                $this->getCodEscola());
        return $this->runQuery($sql);
    }
    public function select($where='', $order=''){
        $sql = sprintf($this->sqlSelect,$where,$order);
        return $this->runSelect($sql);   
}

}