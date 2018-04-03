<?php

namespace Components\Module_comum;
if(!session_start()){
            session_start();
            
        }
class PayPalComponent {
    
    //Lógica para trabalhar com Ajax
    
    static public function run(){
     
        if($_REQUEST){
            $method = isset ($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $payPalComponent = new PayPalComponent();
            $payPalComponent->show($method);
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
                echo $_SESSION['user'],$_SESSION['senha'];
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }
    }
}
PayPalComponent::run();