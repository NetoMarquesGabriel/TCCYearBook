<?php

namespace Components\Module_comum;
use Core\Turma;
use Core\Usuario;
use Core\TipoUsuario;
use Core\Aluno;
use Core\Midia;

class CadastroAlunoComponent {
    
    //Lógica para trabalhar com Ajax
    
    static public function run(){
     
        if($_REQUEST){
            $method = isset ($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $cadastroAlunoComponent = new CadastroAlunoComponent();
            $cadastroAlunoComponent->show($method);
        }
        
    }
            //fim da lógica
    

    public function show($method){
        switch ($method) {
            case 'conteudoInicial':
                $this->conteudoInicial();        

                break;
            case 'cadastrar2':
                $this->cadastrar2();        

                break;

            default:
                break;
        }
        
        
            
        }
        public function conteudoInicial() {
            try {
                echo '<div id="container_P">
                <div id="bg_1">
                    <div id="CP">
                        <h1 id="i_h1_cp" >Cadastre-se</h1>
                        

                        <form method="post">
                    <input type="hidden" name="component" value="CadastroAlunoComponent" />
                    <input type="hidden" name="method" value="cadastrar2" />
                        <input id="i_inp3_ce" type="text" placeholder="codigo de cadastro" name="cod_cad" required min="3"> <br>
                        <a href="#">não possui codigo de cadastro? entenda sobre nosso sistema</a>
                        <input type="text" placeholder="Nome completo" name="nome_pessoa" required min="7">
                        <input type="text" placeholder="Email" name="email_pessoa" required min="7">
                        <input id="i_inp7_ce" type="password" placeholder="Senha" name="senha_pessoa" required min="6">
                        <input id="i_inp8_ce" type="password" placeholder="Confirme sua senha" name="confirma_escola" required min="6">  
                        <input id="i_inp1_ce" type="DATE"  name="data_nasc" required >
                        <div id="aux_3">
                            <p  id="i_p" class="mouse">Li e concordo com os termos
                            <input id="i_inp9_ce" class="check" placeholder="." type="checkbox" name="Aceito" required>
                            </p>
                        </div>
                        <button type="submit" value="Enviar">
                            Enviar
                        </button>
                        </form>
                        

                    </div>  
                </div>
                <div id="bg_2">
                    <div id="term_2">
                        <h2 id="i_h2" >Termos de uso e política de privacidade</h2>
                        <p id="i_p2" id="termos">
                            
        Todas as suas informações pessoais recolhidas, serão usadas para o ajudar a tornar a sua visita no nosso site o mais produtiva e agradável possível. A garantia da confidencialidade dos dados pessoais dos utilizadores do nosso site é importante para o YEAHBOOK!. Todas as informações pessoais relativas a membros, assinantes, clientes ou visitantes que usem o YEAHBOOK! serão tratadas em concordância com a Lei da Proteção de Dados Pessoais de 26 de outubro de 1998 (Lei n.º 67/98). A informação pessoal recolhida pode incluir o seu nome, e-mail, número de telefone e/ou telemóvel, morada, data de nascimento e/ou outros. O uso do YEAHBOOK! pressupõe a aceitação deste Acordo de privacidade. A equipa do YEAHBOOK! reserva-se ao direito de alterar este acordo sem aviso prévio. Deste modo, recomendamos que consulte a nossa política de privacidade com regularidade de forma a estar sempre atualizado.Os anúncios tal como outros websites, coletamos e utilizamos informação contida nos anúncios. A informação contida nos anúncios, inclui o seu endereço IP (Internet Protocol), o seu ISP (Internet Service Provider, como o Sapo, Clix, ou outro), o browser que utilizou ao visitar o nosso website (como o Internet Explorer ou o Firefox), o tempo da sua visita e que páginas visitou dentro do nosso website.Ligações a Sites de terceiros. O YEAHBOOK! possui ligações para outros sites, os quais, a nosso ver, podem conter informações / ferramentas úteis para os nossos visitantes. A nossa política de privacidade não é aplicada a sites de terceiros, pelo que, caso visite outro site a partir do nosso deverá ler a politica de privacidade do mesmo.Não nos responsabilizamos pela política de privacidade ou conteúdo presente nesses mesmos sites. 
                        
                        </p>
                    </div>
                </div>
            </div>';
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }
    }
    public function cadastrar2() {
        try {
            $codCadastro = $_REQUEST['cod_cad'];
            $user = $_REQUEST['email_pessoa'];
            $senha = $_REQUEST['senha_pessoa'];
            $nome = $_REQUEST['nome_pessoa'];
            $dataNasc = $_REQUEST['data_nasc'];
            $turma = new Turma();
            $array = $turma->select("and cod_registro = '".$codCadastro."'");
           // echo count ($array);
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
                    $tipoUsuario->setNomeTipoUsuario('A');
                    $tipoUsuario->insert();
                    session_start();
                    $_SESSION['tipo_cadastro'] = 'A';
                    $_SESSION['user'] = $user;
                    $_SESSION['senha'] = $senha;
                    $aluno = new Aluno();
                    $aluno->setApelido('apelido');
                    $aluno->setCodStatusAluno('A');
                    $aluno->setDataNasc($dataNasc);
                    $aluno->setCodUsuario($codUsuario);
                    $aluno->setCodTurma($array[0]['cod_turma']);
                    $aluno->setFrase('frase');
                    $aluno->setRedesSociais('Redes Sociais');
                    $aluno->setTextoFeed('um Feed');
                    $aluno->insert();
                    
                    $midia = new Midia();
                    $midia->setCodStatusMidia('A');
                    $midia->setCodUsuario($codUsuario);
                    $midia->setTipoMidia('P');
                    $midia->setUrl('images/avatar.png');
                    if($midia->insert()){
                        
                        echo '<script>';
                        echo "location.href='index.php?component=LoginComponent&method=autenticar'";
                        echo '</script>';
                        
                    }
                    
                    //$tipoUsuario->insert(); 
                
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
CadastroAlunoComponent::run();