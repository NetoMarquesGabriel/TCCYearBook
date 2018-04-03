<?php
//require_once 'model/TipoUsuarioM.class.php';
namespace Action;
use Model\AlunoM;

class AlunoA extends AlunoM{
    protected $sqlInsert = "insert into aluno(apelido,frase,texto_feed,data_nasc,cod_status_aluno,cod_usuario,redes_sociais,cod_turma) values ('%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlDelete = "delete from aluno where cod_aluno = '%s'";
    protected $sqlSelect = "select * from aluno where 1=1 %s %s";
    protected $sqlUpdate = "update aluno set apelido = '%s',frase = '%s',texto_feed = '%s',data_nasc = '%s',cod_status_aluno = '%s',redes_sociais = '%s',cod_turma  = '%s' where cod_usuario = '%s' and cod_aluno = '%s'";
     
    public function insert(){
        $sql = sprintf($this->sqlInsert,
            $this->getApelido(),
            $this->getfrase(),
            $this->getTextoFeed(),
            $this->getDataNasc(),
            $this->getCodStatusAluno(),
            $this->getCodUsuario(),
            $this->getRedesSociais(),    
            $this->getCodTurma());
        return $this->runQuery($sql);
    }
            public function update(){
        $sql = sprintf($this->sqlUpdate,
            $this->getApelido(),
            $this->getfrase(),
            $this->getTextoFeed(),
            $this->getDataNasc(),
            $this->getCodStatusAluno(),
            $this->getRedesSociais(),    
            $this->getCodTurma(),
            $this->getCodUsuario(),
            $this->getCodAluno());
        return $this->runQuery($sql);
    }
    
    public function delete(){
        $sql = sprintf($this->sqlDelete,
                $this->getCodAluno());
        return $this->runQuery($sql);
    }
    public function select($where='', $order=''){
        $sql = sprintf($this->sqlSelect,$where,$order);
        return $this->runSelect($sql);   
}

}