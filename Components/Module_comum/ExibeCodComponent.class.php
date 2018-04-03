<?php

namespace Components\Module_comum;
if(!session_start()){
            session_start();
            
        }
class ExibeCodComponent {
    
    //Lógica para trabalhar com Ajax
    
    static public function run(){
     
        if($_REQUEST){
            $method = isset ($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $exibeCodComponent = new ExibeCodComponent();
            $exibeCodComponent->show($method);
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
                $codRegistro = $_SESSION['cod_registro'];
                echo'<div id="cad_rep">
                <h2 id="i_h2_rep">Seu código de representante é</h2>
                <h1>'.$codRegistro.'</h1>
                <p id="i_p_rep"><b>* Lembre-se pois será o código utilizado para sua escola cadastrar os alunos e salas.</b></p>
            </div>
            <a id="i_a_cadr" href="javascript:document.location=';echo"'?component=LoginComponent&method=autenticar'";echo'">Começar!</a>
        </div>';
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }
    }
}
ExibeCodComponent::run();
