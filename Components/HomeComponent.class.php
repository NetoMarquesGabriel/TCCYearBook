<?php

namespace Components;

class HomeComponent {
    
    //Lógica para trabalhar com Ajax
    
    static public function run(){
     
        if($_REQUEST){
            $method = isset ($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $homeComponent = new HomeComponent();
            $homeComponent->show($method);
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
        
        public function show2($method2){
        switch ($method2) {
            case 'ContaInativa':
                $this->ContaInativa();        

                break;
            case 'SenhaIncorreta':
                $this->SenhaIncorreta();        

                break;
            case 'Sememail':
                $this->Sememail();        

                break;

            default:
                break;
        }
        
        
            
        }
        public function conteudoInicial() {
            try {
//                echo'<form  method="post" >   
//                    <input type="hidden" name="acaoAjax" value="autenticar" />
//                <label>Email:</label><input type="email" placeholder="seu@email.com" name="user" id="user" required autofocus>                
//                <label>Senha:</label><input type="password" placeholder="Digite sua senha" name="senha" id="senha" required > 
//                <a href="esqueceu_senha.html">Esqueceu sua senha?</a>
//                <a class="envio" href="javascript:document.location=';echo"'"; echo"?component=LoginComponent&method=autenticar'";echo'"  >Enviar</a>
//
//            </form>';
               // echo 'Conteudo Dinâmico!';
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }
    }
    //href="javascript:document.location='?component=LoginComponent&method=autenticar'" 
    public function ContaInativa() {
            try {
                echo '<font color="RED" style="display:center">Sua Conta Está Inativa!';
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }
    }
    
    public function SenhaIncorreta() {
            try {
//                foreach ($_SESSION as $key => $value) {
//                print($key.' - '.$value.'<br>');
//                };
//
//                foreach ($_COOKIE as $key => $value) {
//                print($key.' - '.$value.'<br>');
//                };  
                echo '<font color="RED" style="display:center">Sua senha está Incorreta!';
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }
    }
    
    public function Sememail() {
            try {
                echo '<font color="RED" style="display:center">Insira um email e senha!';
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }
    }
}
HomeComponent::run();