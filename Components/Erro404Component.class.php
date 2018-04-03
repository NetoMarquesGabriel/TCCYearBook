<?php
namespace Components;

class Erro404Component{
    
        public function __construct() {
       	     
        
    }
    // lógica para requisições ajax
    static public function run()
        {
           if($_REQUEST ){
                  $method = isset($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
                  $erroComponent = new Erro404Component();
                  $erroComponent->show($method);
                }
        }
    // fim lógica para trabalhar com o ajax

function show($acao){
    switch ($acao) {
        case 'conteudoInicial':
             $this->conteudoInicial();
             //$this->loadUsersAjax(0,2);
        break;
      
        default:
            break;
    }
}



public function conteudoInicial(){
 try {
         echo 'Página não encontrada!';
          
          
  } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
   
}
    
}
Erro404Component::run();