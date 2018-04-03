<?php

namespace Components\Module_restrito;

class ConfigComponent {
    
    //Lógica para trabalhar com Ajax
    
    static public function run(){
     
        if($_REQUEST){
            $method = isset ($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $configComponent = new ConfigComponent();
            $configComponent->show($method);
        }
        
    }
            //fim da lógica
    

    public function show($method){
        switch ($method) {
            case 'conteudoInicial':
                $this->conteudoInicial();        

                break;
            case 'alterarEmail':
                $this->conteudoInicial();        

                break;
            case 'alterarSenha':
                $this->conteudoInicial();        

                break;
            

            default:
                break;
        }
        
        
            
        }
        public function conteudoInicial() {
            session_start();
            try {
                if($_SESSION['tipo_usuario'] == 'A'){
                echo '<div id="ver">                    
                    <ul>
                        <li id="PT2">
                            <button onclick="funcaoConfig2()">
                                <a id="H_a12" href="#EN2">
                                    <img src="images/brasil.png" alt="Bandeira do Brasil">
                                </a>
                            </button>
                        </li>
                        <li id="EN2">
                            <button onclick="funcaoConfig()">
                                <a id="H_a" href="#PT2">
                                    <img src="images/eua.png" alt="Bandeira Estados Unidos">
                                </a>
                            </button>
                        </li>
                        <li><a href="javascript:document.location=';echo"'";echo'?component=PerfilEComponent&method=conteudoInicial&tpl=perfil_restrito_E.html';echo"'";echo'">Meu perfil</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=PerfilTurmaComponent&method=conteudoInicial&tpl=turma-restrito.html';echo"'";echo'">Turma</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=PerfilEscolaComponent&method=conteudoInicial&tpl=escola-comum.html';echo"'";echo'">Escola</a></li>
                   
                    <li><a href="javascript:document.location=';echo"'";echo'?component=QuemSomosComponent&method=conteudoInicial&tpl=quem_somos.html';echo"'";echo'">Quem somos</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=ContatoComponent&method=conteudoInicial&tpl=contato.html';echo"'";echo'">Contato</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=LoginComponent&method=logout';echo"'";echo'">Sair</a></li>
                    </ul>
                </div>
            </nav>    
            <div id="LY">
                <a href="#">
                    <img src="images/Logo.png" alt="Logo Yeahbook">
                </a>
            </div>
        </header>
                <hr>';}elseif($_SESSION['tipo_usuario'] == 'R'){
                echo '<div id="ver">                    
                    <ul>
                        <li id="PT2">
                            <button onclick="funcaoConfig2()">
                                <a id="H_a12" href="#EN2">
                                    <img src="images/brasil.png" alt="Bandeira do Brasil">
                                </a>
                            </button>
                        </li>
                        <li id="EN2">
                            <button onclick="funcaoConfig()">
                                <a id="H_a" href="#PT2">
                                    <img src="images/eua.png" alt="Bandeira Estados Unidos">
                                </a>
                            </button>
                        </li>
                         <li><a href="javascript:document.location=';echo"'";echo'?component=PerfilTurmaEComponent&method=conteudoInicial&tpl=turma-restrito-E.html';echo"'";echo'">Turma</a></li>
                    
                    <li><a href="javascript:document.location=';echo"'";echo'?component=QuemSomosComponent&method=conteudoInicial&tpl=quem_somos.html';echo"'";echo'">Quem somos</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=ContatoComponent&method=conteudoInicial&tpl=contato.html';echo"'";echo'">Contato</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=LoginComponent&method=logout';echo"'";echo'">Sair</a></li>
                    </ul>
                </div>
            </nav>    
            <div id="LY">
                <a href="#">
                    <img src="images/Logo.png" alt="Logo Yeahbook">
                </a>
            </div>
        </header>
                <hr>';}else{
                     echo '<div id="ver">                    
                    <ul>
                        <li id="PT2">
                            <button onclick="funcaoConfig2()">
                                <a id="H_a12" href="#EN2">
                                    <img src="images/brasil.png" alt="Bandeira do Brasil">
                                </a>
                            </button>
                        </li>
                        <li id="EN2">
                            <button onclick="funcaoConfig()">
                                <a id="H_a" href="#PT2">
                                    <img src="images/eua.png" alt="Bandeira Estados Unidos">
                                </a>
                            </button>
                        </li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=PerfilEEscolaComponent&method=conteudoInicial&tpl=perfil_escola_E.html';echo"'";echo'">Escola</a></li>
                   
                    <li><a href="javascript:document.location=';echo"'";echo'?component=QuemSomosComponent&method=conteudoInicial&tpl=quem_somos.html';echo"'";echo'">Quem somos</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=ContatoComponent&method=conteudoInicial&tpl=contato.html';echo"'";echo'">Contato</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=LoginComponent&method=logout';echo"'";echo'">Sair</a></li>
                    </ul>
                </div>
            </nav>    
            <div id="LY">
                <a href="#">
                    <img src="images/Logo.png" alt="Logo Yeahbook">
                </a>
            </div>
        </header>
                <hr>';
                }
                    
        



echo'

        <div id="bg_config">
            <div id="config">
                <h1 id="i_h1_conf">Configurações</h1>
                <h2 id="i_h2_conf">Selecione o seu tipo de perfil</h2>
                    <ul>
                        <form method="post">
                        
                            <li id="i_li_conf">Público - <input type="radio" onclick="tiraTx()"></li>
                            <li id="i_li2_conf">Privado - <input type="radio" onclick="insereTx()"></li>
                            <p id="pTeste"></p>
                            <button id="i_but_conf" type="submit">Enviar</button>
                        </form>
                    </ul>
                <div id="haha">
                <h2 id="i_h22_conf">Trocar de senha</h2>
                


                <form method="post">
                 <input type="hidden" name="component" value="ConfigComponent" />
                 <input type="hidden" name="method" value="alterarSenha" />
                <input id="i_inp_conf" type="password" placeholder="Nova senha" name="password">                
                <input id="i_inp2_conf" type="password" placeholder="Confirme sua nova senha" name="password"> 
                <button type="submit" class="huhu" name="btn_login">Salvar</button>
                    </form
                    
>
                <div id="divTeste3"></div>
                <h2 id="i_h23_conf">Trocar de email</h2>
                 <form method="post">
                 <input type="hidden" name="component" value="ConfigComponent" />
                 <input type="hidden" name="method" value="alterarEmail" />
                <input id="i_inp_conf" type="email" placeholder="Novo email" name="email">                
                <input id="i_inp2_conf" type="email" placeholder="Confirme seu novo email" name="email"> 
                <button type="submit" class="huhu" name="btn_login">Salvar</button>
                    </form
                    


                <div id="divTeste2"></div>
                </div>
                <div id="denuncia">
                    <h2 id="i_h24_conf">Área de denúncias</h2>
                    <form method="post">
                        <input id="i_inp5_conf" class="input" type="text" placeholder="Escreva o nome do infrator e a acusação">
                        <button id="i_but4_conf" type="submit"> Denunciar! </button>
                    </form> 
                </div>
                <h2 id="i_h5_conf">Nossos termos de uso e política de privacidade</h2>
                <p id="i_p_conf" class="pT">
                        
    Todas as suas informações pessoais recolhidas, serão usadas para o ajudar a tornar a sua visita no nosso site o mais produtiva e agradável possível. A garantia da confidencialidade dos dados pessoais dos utilizadores do nosso site é importante para o YEAHBOOK!. Todas as informações pessoais relativas a membros, assinantes, clientes ou visitantes que usem o YEAHBOOK! serão tratadas em concordância com a Lei da Proteção de Dados Pessoais de 26 de outubro de 1998 (Lei n.º 67/98). A informação pessoal recolhida pode incluir o seu nome, e-mail, número de telefone e/ou telemóvel, morada, data de nascimento e/ou outros. O uso do YEAHBOOK! pressupõe a aceitação deste Acordo de privacidade. A equipa do YEAHBOOK! reserva-se ao direito de alterar este acordo sem aviso prévio. Deste modo, recomendamos que consulte a nossa política de privacidade com regularidade de forma a estar sempre atualizado.Os anúncios tal como outros websites, coletamos e utilizamos informação contida nos anúncios. A informação contida nos anúncios, inclui o seu endereço IP (Internet Protocol), o seu ISP (Internet Service Provider, como o Sapo, Clix, ou outro), o browser que utilizou ao visitar o nosso website (como o Internet Explorer ou o Firefox), o tempo da sua visita e que páginas visitou dentro do nosso website.Ligações a Sites de terceiros. O YEAHBOOK! possui ligações para outros sites, os quais, a nosso ver, podem conter informações / ferramentas úteis para os nossos visitantes. A nossa política de privacidade não é aplicada a sites de terceiros, pelo que, caso visite outro site a partir do nosso deverá ler a politica de privacidade do mesmo.Não nos responsabilizamos pela política de privacidade ou conteúdo presente nesses mesmos sites.

                </p>
                </div>              
            </div>
        </div> ';
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }
            
            
            
    }
    public function alterarEmail() {
        try {
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
        public function alterarSenha() {
        try {
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
}
ConfigComponent::run();