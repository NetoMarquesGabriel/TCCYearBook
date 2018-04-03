<?php

//require_once 'model/UsuarioM.class.php';

namespace Action;

use Model\UsuarioM;

class UsuarioA extends UsuarioM {

    protected $sqlInsert = "insert into usuario(email_usuario,senha_usuario,nome_usuario,cod_status_usuario) values ('%s','%s','%s','%s')";
    protected $sqlDelete = "delete from usuario where cod_usuario='%s'";
    protected $sqlSelect = "select * from usuario where 1=1 %s %s";
    protected $sqlUpdate = "update usuario set email_usuario= '%s',
                                           senha_usuario= '%s',
                                           nome_usuario= '%s',
                                           cod_status_usuario= '%s'
                                           where cod_usuario= '%s'";
    protected $sqlDeleteLogic = "update usuario set cod_status_usuario = '%s' where cod_usuario = '%s'";

    public function insert() {
        $sql = sprintf($this->sqlInsert,
                $this->getEmailUsuario(),
                $this->getSenhaUsuario(),
                $this->getNomeUsuario(),
                $this->getCodStatusUsuario());
        return $this->runQuery($sql);
    }

    public function delete() {
        $sql = sprintf($this->sqlDelete,
                $this->getCodUsuario());
        return $this->runQuery($sql);
    }

    public function select($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->runSelect($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate,
                $this->getEmailUsuario(),
                $this->getSenhaUsuario(),
                $this->getNomeUsuario(),
                $this->getCodStatusUsuario(),
                $this->getCodUsuario());
        return $this->runQuery($sql);
    }

    public function deleteLogic() {
        $sql = sprintf($this->sqlDeleteLogic,
                $this->getCodStatusUsuario(),
                $this->getCodUsuario());
        return $this->runQuery($sql);
    }

}
