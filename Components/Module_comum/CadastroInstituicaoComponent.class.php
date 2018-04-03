<?php

namespace Components\Module_comum;
            use Core\Usuario;
            use Core\TipoUsuario;
            use Core\Midia;
            use Core\Escola;
            
class CadastroInstituicaoComponent {
    
    //Lógica para trabalhar com Ajax
    
    static public function run(){
     
        if($_REQUEST){
            $method = isset ($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $cadastroInstituicaoComponent = new CadastroInstituicaoComponent();
            $cadastroInstituicaoComponent->show($method);
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
                echo '<div id="container_CE">
                <div id="CE">
                    <h1 id="i_h1_ce">Cadastre sua escola</h1>
                    

                    <form method="post">
                    <input type="hidden" name="component" value="CadastroInstituicaoComponent" />
                    <input type="hidden" name="method" value="cadastrar" />
                        
                        <input type="text" placeholder="Email" name="email_escola" required min="7">
                        <input id="i_inp7_ce" type="password" placeholder="Senha" name="senha_escola" required min="6">
                        <input id="i_inp8_ce" type="password" placeholder="Confirme sua senha" name="confirma_escola" required min="6">  
                        <input id="i_inp1_ce" type="text" placeholder="Nome da escola" name="nome_escola" required >
                        <input type="number" placeholder="CNPJ" name="cpnj_escola" required >
                        <input id="i_inp2_ce" type="number" placeholder="Código educacional" name="cod_ed_escola" required min="1">
                        <input id="i_inp3_ce" type="text" placeholder="Estado" name="estado_escola" required min="3"> 
                        <input id="i_inp4_ce" type="text" placeholder="Cep" name="cep_escola" required >
                        <input id="i_inp5_ce" type="text" placeholder="Cidade" name="cidade_escola" required min="3"> 
                        <input id="i_inp6_ce" type="text" placeholder="Nome da rua" name="nome_rua_escola" required min="5">
                        <div id="aux_3">
                            <p  id="i_p" class="mouse">Li e concordo com os termos
                            <input id="i_inp7_ce" class="check" placeholder="." type="checkbox" name="Aceito" required>
                            </p>
                        </div>
                        <button type="submit" value="Enviar">
                            Enviar
                        </button>
                    </form>
               </div>
                    <div id="term_2">
                        <h2 id="i_h2" >Termos de uso e política de privacidade</h2>
                        <p id="i_p2" id="termos">
                            
                         Todas as suas informações pessoais recolhidas, serão usadas para o ajudar a tornar a sua visita no nosso site o mais produtiva e agradável possível. A garantia da confidencialidade dos dados pessoais dos utilizadores do nosso site é importante para o YEAHBOOK!. Todas as informações pessoais relativas a membros, assinantes, clientes ou visitantes que usem o YEAHBOOK! serão tratadas em concordância com a Lei da Proteção de Dados Pessoais de 26 de outubro de 1998 (Lei n.º 67/98). A informação pessoal recolhida pode incluir o seu nome, e-mail, número de telefone e/ou telemóvel, morada, data de nascimento e/ou outros. O uso do YEAHBOOK! pressupõe a aceitação deste Acordo de privacidade. A equipa do YEAHBOOK! reserva-se ao direito de alterar este acordo sem aviso prévio. Deste modo, recomendamos que consulte a nossa política de privacidade com regularidade de forma a estar sempre atualizado.Os anúncios tal como outros websites, coletamos e utilizamos informação contida nos anúncios. A informação contida nos anúncios, inclui o seu endereço IP (Internet Protocol), o seu ISP (Internet Service Provider, como o Sapo, Clix, ou outro), o browser que utilizou ao visitar o nosso website (como o Internet Explorer ou o Firefox), o tempo da sua visita e que páginas visitou dentro do nosso website.Ligações a Sites de terceiros. O YEAHBOOK! possui ligações para outros sites, os quais, a nosso ver, podem conter informações / ferramentas úteis para os nossos visitantes. A nossa política de privacidade não é aplicada a sites de terceiros, pelo que, caso visite outro site a partir do nosso deverá ler a politica de privacidade do mesmo.Não nos responsabilizamos pela política de privacidade ou conteúdo presente nesses mesmos sites.

                        </p>
                    </div>
                </div> ';
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }
    }
    public function cadastrar() {
            try {
                $nomeEscola = $_REQUEST['nome_escola'];
                $user = $_REQUEST['email_escola'];
                $senha = $_REQUEST['senha_escola'];
               
                $usuario = new Usuario();
                $usuario->setNomeUsuario($nomeEscola);
                $usuario->setSenhaUsuario($senha);
                $usuario->setEmailUsuario($user);
                $usuario->setCodStatusUsuario('A');
                    $usuario->insert();
                    $array = $usuario->select("and email_usuario ='".$user."'and senha_usuario='".$senha."'");
                    echo $array[0]['cod_usuario'];
                    $codUsuario = $array[0]['cod_usuario'];
                    $tipoUsuario = new TipoUsuario();
                    $tipoUsuario->setCodUsuario($codUsuario);
                    $tipoUsuario->setCodStatusTipoUsuario('A');
                    $tipoUsuario->setNomeTipoUsuario('E');
                    $tipoUsuario->insert(); 
                    
                    $escola = new Escola();
                    $escola->setCodUsuario($codUsuario);
                    $escola->setCodStatusEscola('A');
                    $escola->setTexto('Fale sobre sua escola');
                    $string = $nomeEscola;
                    $juntar1 = substr("$string", 0, 2);
                    $juntar2 = substr("$senha", 0, 2);
                    $codRegistro = $juntar1.$juntar2.'2017';
                    $escola->setCodRegistro($codRegistro);
                    //echo $codRegistro;
                    if($escola->insert()){
                        session_start();
                        $_SESSION['cod_registro'] = $codRegistro;
                        $_SESSION['tipo_cadastro'] = 'E';
                        $_SESSION['user'] = $user;
                        $_SESSION['senha'] = $senha;
                        echo '<script>';
                        echo "location.href='index.php?component=CalcularPlanosComponent&method=conteudoInicial&tpl=calc.html'";
                        echo '</script>';
                    }
                    
                    
                
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }
    }
}
CadastroInstituicaoComponent::run();