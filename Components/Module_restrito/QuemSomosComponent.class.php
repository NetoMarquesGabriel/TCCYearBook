<?php

namespace Components\Module_restrito;

class QuemSomosComponent {
    
    //Lógica para trabalhar com Ajax
    
    static public function run(){
     
        if($_REQUEST){
            $method = isset ($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $quemSomosComponent = new QuemSomosComponent();
            $quemSomosComponent->show($method);
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
                if(isset($_SESSION['cod_usuario'])){
                     echo '<header id="header_HR">           
            <input type="checkbox" id="navicon">
            <div class="nav-toggle">
              <label for="navicon" class="hamburger">
                <span></span>
                <span></span>
                <span></span>
              </label>
            </div>
            <nav class="sidebar" role="complementary">
            <div id="ver"> 
                <ul>
                    <li id="PT2">
                        <button onclick="funcao38()">
                            <a id="H_a12" href="#EN2">
                               <img src="images/brasil.png" alt="Bandeira do Brasil">
                            </a>
                        </button>
                    </li>
                    <li id="EN2">
                        <button onclick="funcao37()">
                            <a id="H_a" href="#PT2">
                                <img src="images/eua.png" alt="Bandeira Estados Unidos">
                            </a>
                        </button>
                    </li>
                    <li><a id="i_li_hr" href="perfil_aluno_E.html">Meu perfil</a></li> 
                    <li><a id="i_li2_hr" href="perfil_turma.html">Turma</a></li>
                    <li><a id="i_li3_hr" href="perfil_escola.html">Escola</a></li>
            <!--         <li><a id="i_li4_hr" href="quem_somos2.html">Quem somos</a></li>-->
                    <li><a id="i_li5_hr" href="contato2.html">Contato</a></li>
                    <li><a id="i_li6_hr" href="config.html">Configurações</a></li>
                    <li><a id="i_li7_hr" href="index.html">Sair</a></li>
                </ul>
               </div>  
            </nav>
            <div id="LY">
                <a href="home_restrita.html">
                    <img src="images/Logo.png" alt="Logo Yeahbook">
                </a>
            </div>
        </header>
        <hr id="oi">
        <!-- Header Desktop -->
        <header id="pum">
            <a href="index.html"><img src="images/Logo.png" alt="Logo Yeahbook"></a>
        </header>
        <hr id="xau">
        <div id="body">
        <div id="container_QS">
            <div id="augusto">
                <img src="images/Augusto.png" alt="Augusto foto">
                <div class="auxiliar">
                <h1>
                    Augusto Seabra
                </h1>
                <ul>
                    <li id="i_li_qs" >17 anos</li>
                    <li id="i_li2_qs" >Desenvolvedor front-end</li>
                    <li>Pirituba - SP</li>                  
                </ul>
                </div>
            </div>
           <div id="gordao">
               <img src="images/Gordao.png" alt="João foto">
                <div class="auxiliar2">
                    <h1>
                        João P. Ramos
                    </h1>
                <ul>
                    <li id="i_li_qs8" >17 anos</li>
                    <li>Designer UX</li>
                    <li>Santana de Parnaíba - SP</li>                  
                </ul>
                </div>
           </div>
           <div id="marques">
               <img src="images/Marques.png" alt="Gabriel foto">
               <div class="auxiliar">
                <h1>
                    Gabriel Marques
                </h1>
                <ul>
                    <li id="i_li3_qs" >18 anos</li>
                    <li id="i_li4_qs" >Desenvolvedor back-end</li>
                    <li>Barueri - SP</li>                  
                </ul>
                </div>
           </div>
            <div id="arthur">
                <img src="images/Arthur.png" alt="Arthur foto">
                <div class="auxiliar2">
                    <h1>
                        Arthur Silva
                    </h1>
                <ul>
                    <li id="i_li_qs9" >17 anos</li>
                    <li id="i_li5_qs" >Auxiliar front-end/designer</li>
                    <li>Barueri - SP</li>                  
                </ul>
                </div>
            </div>
           <div id="sid">
               <img src="images/Sid.png" alt="Wellinton Foto">
           <div class="auxiliar">
                <h1>
                    Wellinton S. Batista
                </h1>
                <ul>
                    <li id="i_li3_qs10" >18 anos</li>
                    <li id="i_li6_qs" >Monografia/Designer</li>
                    <li>Barueri - SP</li>                  
                </ul>
                </div>
           </div>
            <div id="emily">
                <img src="images/Emily.png" alt="Emily foto">
                <div class="auxiliar2">
                    <h1>
                        Emily Ferreira
                    </h1>
                <ul>
                    <li id="i_li7_qs" >16 anos</li>
                    <li>Designer</li>
                    <li>Carapicuíba - SP</li>                  
                </ul>
                </div>
            </div> 
            <div id="leo">
               <img src="images/Leonardo.png" alt="Leonardo foto">
           <div class="auxiliar">
                <h1>
                    Leonardo Pereira
                </h1>
                <ul>
                    <li id="i_li_qs11" >17 anos</li>
                    <li id="i_li6_qs12" >Monografia/Designer</li>
                    <li>Carapicuíba - SP</li>                  
                </ul>
                </div>
           </div>        
        </div>
    </div>';
                }else{
                    echo'<header id="teste">
            <div id="alterar">
                    <ul>             
                        <li id="PT">
                            <button onclick="funcao18()">
                                <a id="H_a1" href="#EN">
                                    <img src="images/brasil.png" alt="Bandeira do Brasil">
                                </a>
                            </button>
                        </li>
                        <li id="EN">
                            <button onclick="funcao17()">
                                <a id="H_a" href="#PT">
                                    <img src="images/eua.png" alt="Bandeira Estados Unidos">
                                </a>
                            </button>
                        </li>
                    </ul>
                </div>
            <a href="index.html">
                <img src="images/Logo.png" alt="Logo Yeahbook">
            </a>
        </header>
        <hr id="oi">
        <!-- Header Desktop -->
        <header id="pum">
            <a href="index.html"><img src="images/Logo.png" alt="Logo Yeahbook"></a>
        </header>
        <hr id="xau">
    <div id="body">
        <div id="container_QS">
            <div id="augusto">
                <img src="images/Augusto.png" alt="Augusto foto">
                <div class="auxiliar">
                <h1>
                    Augusto Seabra
                </h1>
                <ul>
                    <li id="i_li_qs" >17 anos</li>
                    <li id="i_li2_qs" >Desenvolvedor front-end</li>
                    <li>Pirituba - SP</li>                  
                </ul>
                </div>
            </div>
           <div id="gordao">
               <img src="images/Gordao.png" alt="João foto">
                <div class="auxiliar2">
                    <h1>
                        João P. Ramos
                    </h1>
                <ul>
                    <li id="i_li_qs8" >17 anos</li>
                    <li>Designer UX</li>
                    <li>Santana de Parnaíba - SP</li>                  
                </ul>
                </div>
           </div>
           <div id="marques">
               <img src="images/Marques.png" alt="Gabriel foto">
               <div class="auxiliar">
                <h1>
                    Gabriel Marques
                </h1>
                <ul>
                    <li id="i_li3_qs" >18 anos</li>
                    <li id="i_li4_qs" >Desenvolvedor back-end</li>
                    <li>Barueri - SP</li>                  
                </ul>
                </div>
           </div>
            <div id="arthur">
                <img src="images/Arthur.png" alt="Arthur foto">
                <div class="auxiliar2">
                    <h1>
                        Arthur Silva
                    </h1>
                <ul>
                    <li id="i_li_qs9" >17 anos</li>
                    <li id="i_li5_qs" >Auxiliar front-end/designer</li>
                    <li>Barueri - SP</li>                  
                </ul>
                </div>
            </div>
           <div id="sid">
               <img src="images/Sid.png" alt="Wellinton Foto">
           <div class="auxiliar">
                <h1>
                    Wellinton S. Batista
                </h1>
                <ul>
                    <li id="i_li3_qs10" >18 anos</li>
                    <li id="i_li6_qs" >Monografia/Designer</li>
                    <li>Barueri - SP</li>                  
                </ul>
                </div>
           </div>
            <div id="emily">
                <img src="images/Emily.png" alt="Emily foto">
                <div class="auxiliar2">
                    <h1>
                        Emily Ferreira
                    </h1>
                <ul>
                    <li id="i_li7_qs" >16 anos</li>
                    <li>Designer</li>
                    <li>Carapicuíba - SP</li>                  
                </ul>
                </div>
            </div> 
            <div id="leo">
               <img src="images/Leonardo.png" alt="Leonardo foto">
           <div class="auxiliar">
                <h1>
                    Leonardo Pereira
                </h1>
                <ul>
                    <li id="i_li_qs11" >17 anos</li>
                    <li id="i_li6_qs12" >Monografia/Designer</li>
                    <li>Carapicuíba - SP</li>                  
                </ul>
                </div>
           </div>        
        </div>
    </div>';
                    
                }
               
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }
    }
}
QuemSomosComponent::run();