<?php

namespace Components\Module_restrito;
use Core\usuario;
session_start();
class RestritoComponent {
    
    //Lógica para trabalhar com Ajax
    
    static public function run(){
     
        if($_REQUEST){
            $method = isset ($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $restritoComponent = new RestritoComponent();
            $restritoComponent->show($method);
        }
        
    }
            //fim da lógica
    

    public function show($method){
        switch ($method) {
            case 'conteudoInicial':
                $this->conteudoInicial();        

                break;

            default:
                break;
        }
        
        
            
        }
        public function conteudoInicial() {
            try {
                
               $usuario = new usuario;
               $json = $usuario->select();
               echo $json[0]['email_usuario'];
               
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }
    }
}
RestritoComponent::run();