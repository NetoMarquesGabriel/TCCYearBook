<?php

namespace Components\Module_restrito;
    use Core\Midia;
    use Core\Turma;
if(!session_start()){
            session_start();
        }
//        $_SESSION['tipo_usuario'] = "A";
//        $_SESSION['nome_usuario'] = "MARQUES";
  
class HomeRestritoComponent {
    
    //Lógica para trabalhar com Ajax
    
    static public function run(){
     
        if($_REQUEST){
            $method = isset ($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $homeRestritoComponent = new HomeRestritoComponent();
            $homeRestritoComponent->show($method);
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
//                $codUsuario = 1;
//                $escola = new Escola();
//                $array = $escola->select("and cod_usuario='".$codUsuario."'");
//                $codRegistro = md5_file($array[0]['cod_registro'],4);
//                echo $codRegistro;
                if($_SESSION['tipo_usuario'] == 'A'){
                    $turma = new Turma();
                    $array = $turma->select("and cod_turma ='".$_SESSION['cod_turma']."'");
                    $codEscola = $array[0]['cod_escola'];    
                    
                    echo'<nav class="sidebar" role="complementary">
                <ul>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=PerfilEComponent&method=conteudoInicial&tpl=perfil_restrito_E.html';echo"'";echo'">Meu perfil</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=PerfilTurmaComponent&method=conteudoInicial&tpl=turma-restrito.html';echo"'";echo'">Turma</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=PerfilEscolaComponent&method=conteudoInicial&tpl=escola-comum.html';echo"'";echo'">Escola</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=ConfigComponent&method=conteudoInicial&tpl=config.html';echo"'";echo'">Configurações</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=QuemSomosComponent&method=conteudoInicial&tpl=quem_somos.html';echo"'";echo'">Quem somos</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=ContatoComponent&method=conteudoInicial&tpl=contato.html';echo"'";echo'">Contato</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=LoginComponent&method=logout';echo"'";echo'">Sair</a></li>
                </ul>
            </nav>    
            <div id="LY">
              <a href="javascript:document.location=';echo"'";echo'?component=HomeRestritoComponent&method=conteudoInicial&tpl=home-restrito.html';echo"'";echo'">
                    <img src="images/Logo.png" alt="Logo Yeahbook">
                </a>
            </div>
        </header>
        <hr>
        <div id="fundo_HR">
            <div id="perf">
                <a href="javascript:document.location=';echo"'";echo'?component=PerfilEComponent&method=conteudoInicial&tpl=perfil_restrito_E.html';echo"'";echo'"><u><b>Entrar no meu perfil</b></u></a>
            </div>
            <div id="perf_turma">
                <a href="javascript:document.location=';echo"'";echo'?component=PerfilTurmaComponent&method=conteudoInicial&tpl=turma-restrito.html';echo"'";echo'"><u><b>Perfil turma</b></u></a>
            </div>
            <div id="perf_escola">
                <a href="javascript:document.location=';echo"'";echo'?component=PerfilEscolaComponent&method=conteudoInicial&cod-escola='.$codEscola.'&tpl=escola-comum.html';echo"'";echo'"><u><b>Perfil escola</b></u></a>
            </div>    
        </div>  ';
                }elseif($_SESSION['tipo_usuario'] == 'R'){
                    
                    
                  echo'<nav class="sidebar" role="complementary">
                <ul>
                   
                    <li><a href="javascript:document.location=';echo"'";echo'?component=PerfilTurmaEComponent&method=conteudoInicial&tpl=turma-restrito-E.html';echo"'";echo'">Turma</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=ConfigComponent&method=conteudoInicial&tpl=config.html';echo"'";echo'">Configurações</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=QuemSomosComponent&method=conteudoInicial&tpl=quem_somos.html';echo"'";echo'">Quem somos</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=ContatoComponent&method=conteudoInicial&tpl=contato.html';echo"'";echo'">Contato</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=LoginComponent&method=logout';echo"'";echo'">Sair</a></li>
                </ul>
            </nav>    
            <div id="LY">
              <a href="javascript:document.location=';echo"'";echo'?component=HomeRestritoComponent&method=conteudoInicial&tpl=home-restrito.html';echo"'";echo'">
                    <img src="images/Logo.png" alt="Logo Yeahbook">
                </a>
            </div>
        </header>
        <hr>
        <div id="fundo_HR">
                       <div id="perf_turma">
                <a href="javascript:document.location=';echo"'";echo'?component=PerfilTurmaEComponent&method=conteudoInicial&tpl=turma-restrito-E.html';echo"'";echo'"><u><b>Perfil turma</b></u></a>
            </div>
                        </div>';
                    
                }else{
                   echo'<nav class="sidebar" role="complementary">
                <ul>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=PerfilEEscolaComponent&method=conteudoInicial&tpl=perfil_escola_E.html';echo"'";echo'">Escola</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=ConfigComponent&method=conteudoInicial&tpl=config.html';echo"'";echo'">Configurações</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=QuemSomosComponent&method=conteudoInicial&tpl=quem_somos.html';echo"'";echo'">Quem somos</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=ContatoComponent&method=conteudoInicial&tpl=contato.html';echo"'";echo'">Contato</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=LoginComponent&method=logout';echo"'";echo'">Sair</a></li>
                </ul>
            </nav>    
            <div id="LY">
              <a href="javascript:document.location=';echo"'";echo'?component=HomeRestritoComponent&method=conteudoInicial&tpl=home-restrito.html';echo"'";echo'">
                    <img src="images/Logo.png" alt="Logo Yeahbook">
                </a>
            </div>
        </header>
        <hr>
        <div id="fundo_HR">
                       <div id="perf_escola">
                 <a href="javascript:document.location=';echo"'";echo'?component=PerfilEEscolaComponent&method=conteudoInicial&tpl=perfil_escola_E.html';echo"'";echo'"><u><b>Perfil escola</b></u></a>
            </div></div> ';
                    
                }
               
              // echo 'aqui vem o conteudo dinamico dos irmão!';
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }
    }
}
HomeRestritoComponent::run();