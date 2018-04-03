<?php
//require_once 'model/TipoUsuarioM.class.php';
namespace Action;
use Model\MidiaM;

class MidiaA extends MidiaM{
    protected $sqlInsert = "insert into midia(cod_usuario,url,tipo_midia,cod_status_midia) values ('%s','%s','%s','%s')";
    protected $sqlDelete = "delete from midia where cod_midia='%s'";
    protected $sqlSelect = "select * from midia where 1=1 %s %s";
    protected $sqlUpdate = "update midia set url = '%s',tipo_midia = '%s',cod_status_midia = '%s' where cod_midia = '%s' and cod_usuario = '%s'";
     
    public function insert(){
        $sql = sprintf($this->sqlInsert,
                $this->getCodUsuario(),
                $this->getUrl(),
                $this->getTipoMidia(),
                $this->getCodStatusMidia());
        return $this->runQuery($sql);
    }
            public function update(){
        $sql = sprintf($this->sqlUpdate,
                $this->getUrl(),
                $this->getTipoMidia(),
                $this->getCodStatusMidia(),
                $this->getCodMidia(),
                $this->getCodUsuario());
        return $this->runQuery($sql);
    }
    
    public function delete(){
        $sql = sprintf($this->sqlDelete,
                $this->getCodMidia());
        return $this->runQuery($sql);
    }
    public function select($where='', $order=''){
        $sql = sprintf($this->sqlSelect,$where,$order);
        return $this->runSelect($sql);   
}

}