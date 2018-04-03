<?php
namespace Config;


// Todas as funcionalidades úteis para todas as classes são construídas aqui
class Cflogin {
   public function getErro($codigoErro){
       switch ($codigoErro){
           case '1045':
               $msg = 'Usuario ou Senha do banco de dados não confere!';
               break;
           case '1049':
               $msg = 'Nome do banco de dados não confere!';
               break;
           case '2002':
               $msg = 'Número da porta do gerenciador mysql não confere!';
               break;
           default :
               $msg = 'Erro!';
       }
       return $msg;
   }
}
