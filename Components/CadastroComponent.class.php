<?php

namespace Components;
use Core\Usuario;
use Core\Aluno;
use Core\Escola;
use Core\Midia;
use Core\TipoUsuario;

class CadastroComponent {
    
    //Lógica para trabalhar com Ajax
    
    static public function run(){
     
        if($_REQUEST){
            $method = isset ($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $cadastroComponent = new CadastroComponent();
            $cadastroComponent->show($method);
        }
        
    }
            //fim da lógica
    

    public function show($method){
        switch ($method) {
            case 'conteudoInicial':
                $this->conteudoInicial();        

                break;
            case 'cadastrar':
                $this->cadastrar();        

                break;

            default:
                break;
        }
        
        
            
        }
        public function conteudoInicial() {
            try {
                echo 'Conteudo Dinâmico!';
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }
    }
    public function cadastrar() {
            try {
                echo 'Conteudo Dinâmico!';
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }
    }
        
}
CadastroComponent::run();