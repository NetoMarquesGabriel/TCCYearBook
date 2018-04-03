<?php

namespace Components\Module_comum;
    use Core\Escola;
    use Core\Usuario;
    use Core\TipoUsuario;
    use Core\Turma;
    if(!session_start()){
            session_start();
            
        }
class CadastroSalaComponent {
    
    //Lógica para trabalhar com Ajax
    
    static public function run(){
     
        if($_REQUEST){
            $method = isset ($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $cadastroSalaComponent = new CadastroSalaComponent();
            $cadastroSalaComponent->show($method);
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
                echo '<div id="container_CS">
                <div id="CP">
                        <h1 id="i_h1_cs">Cadastre sua sala</h1>
                        
                       <form method="post">
                    <input type="hidden" name="component" value="CadastroSalaComponent" />
                    <input type="hidden" name="method" value="cadastrar" />
                        <input id="i_inp1_cs" type="text" placeholder="Código representante" name="cod_rep" min="4"><br>
                         <a href="#">Não possui um código de representante? não se preocupe! clique aqui.</a>
                         <input type="text" placeholder="Email" name="email_sala" required min="7"> 
                         <input id="i_inp2_cs" type="password" placeholder="Senha" name="senha_sala" required min="6">
                         <input id="i_inp3_cs" type="password" placeholder="Confirme sua senha" name="confirma_sala" required min="6">  
                        <input id="i_inp4_cs" type="text" placeholder="Nome da Sua sala" name="nome_sala" required min="1"> 
                        <input id="i_inp5_cs" type="text" placeholder="Sigla" name="sigla_sala" required min="3">
                        <input id="i_inp6_cs" type="number" placeholder="Ano" name="ano_sala" required min="3">
                        <div id="aux_3">
                            <p id="i_p" class="mouse">Li e concordo com os termos
                                <input class="check" type="checkbox" name="Aceito" value="Aceito" required>
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
            </div>';
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }
    }
    
    public function cadastrar(){
        try {
            $codRegistro = $_REQUEST['cod_rep'];
            $user = $_REQUEST['email_sala'];
            $senha = $_REQUEST['senha_sala'];
            $nome = $_REQUEST['nome_sala'];
            $sigla = $_REQUEST['sigla_sala'];
            $ano = $_REQUEST['ano_sala'];
            
            $escola = new Escola();
            $array = $escola->select("AND cod_registro='".$codRegistro."'");
            if(count($array) > 0){
                
                
                $usuario = new Usuario();
                $usuario->setNomeUsuario($nome);
                $usuario->setSenhaUsuario($senha);
                $usuario->setEmailUsuario($user);
                $usuario->setCodStatusUsuario('A');
                    $usuario->insert();
                    $array2 = $usuario->select("and email_usuario ='".$user."'and senha_usuario='".$senha."'");
                    $codUsuario = $array2[0]['cod_usuario'];
                    $tipoUsuario = new TipoUsuario();
                    $tipoUsuario->setCodUsuario($codUsuario);
                    $tipoUsuario->setCodStatusTipoUsuario('A');
                    $tipoUsuario->setNomeTipoUsuario('R');
                    $tipoUsuario->insert(); 
                    
                    
                    
                    $turma = new Turma();
                    $turma->setAno($ano);
                    $turma->setCodEscola($array[0]['cod_escola']);
                    $turma->setCodStatusTurma('A');
                    $turma->setCodUsuario($codUsuario);
                    $turma->setNome($nome);
                    $turma->setSigla($sigla);
                    $turma->setCodRepresentante($codUsuario);
                    $string = $nome;
                    $juntar1 = substr("$string", 0, 2);
                    $juntar2 = substr("$senha", 0, 2);
                    $juntar3 = substr($array[0]['cod_escola'], 0, 2);
                    $codRegistro = $juntar1.$juntar2.$juntar3;
                    $turma->setCodRegistro($codRegistro);
                    echo $turma->getAno();
                    echo $turma->getNome();
                    echo $turma->getSigla();
                    echo $turma->getCodStatusTurma();
                    echo $turma->getCodRepresentante();
                    echo $turma->getCodUsuario();
                    echo $turma->getCodEscola();
                    echo $turma->getCodRegistro();
                    if($turma->insert()){
                        
                        $_SESSION['tipo_cadastro'] = 'R';
                        $_SESSION['user'] = $user;
                        $_SESSION['senha'] = $senha;
                        echo '<script>';
                        echo "location.href='index.php?component=LoginComponent&method=autenticar'";
                        echo '</script>';
                        
                    }
                  }
                  
                  else{
                      echo 'seu codigo de cadastro é invalido';
                      echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
                      
                  }
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
}
CadastroSalaComponent::run();