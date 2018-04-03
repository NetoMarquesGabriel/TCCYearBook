<?php
//require_once 'model/TipoUsuarioM.class.php';
namespace Action;
use Model\TipoUsuarioM;

class TipoUsuarioA extends TipoUsuarioM{
    protected $sqlInsert = "insert into tipo_usuario(nome_tipo_usuario,cod_status_tipo_usuario,cod_usuario) values ('%s','%s','%s')";
    protected $sqlDelete = "delete from tipo_usuario where cod_tipo_usuario='%s'";
    protected $sqlSelect = "select * from tipo_usuario where 1=1 %s %s";
    protected $sqlUpdate = "update tipo_usuario set nome_tipo_usuario = '%s',cod_status_tipo_usuario = '%s' where cod_tipo_usuario = '%s' and cod_usuario = '%s'";
     
    public function insert(){
        $sql = sprintf($this->sqlInsert,
                $this->getNomeTipoUsuario(),
                $this->getCodStatusTipoUsuario(),
                $this->getCodUsuario());
        return $this->runQuery($sql);
    }
            public function update(){
        $sql = sprintf($this->sqlUpdate,
                $this->getNomeTipoUsuario(),
                $this->getCodStatusTipoUsuario(),
                $this->getCodTipoUsuario(),
                $this->getCodUsuario());
        return $this->runQuery($sql);
    }
    
    public function delete(){
        $sql = sprintf($this->sqlDelete,
                $this->getCodTipoUsuario());
        return $this->runQuery($sql);
    }
    public function select($where='', $order=''){
        $sql = sprintf($this->sqlSelect,$where,$order);
        return $this->runSelect($sql);   
}

}