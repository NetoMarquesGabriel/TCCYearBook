<?php
namespace Components;
use Core\Usuario;
use Core\Log;
use Core\Aluno;
use Core\Escola;
use Core\Funcionario;
use Core\Midia;
use Core\TipoUsuario;
use Core\Turma;
use Core\Lista;
use Core\Oscar;

if(!session_start()){
            session_start();
            
        }
class LoginComponent {
  
        
       static public function run() {
             if(!defined('DSA')){
            define('DSA', DIRECTORY_SEPARATOR);
            
        }
           
           
        if(isset($_REQUEST['acaoAjax'])){
            
            require_once dirname( dirname( __FILE__ ) ). DSA.'ajax.php'; // RECUA 2 NÍVEIS
            $method = isset($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $loginComponent = new LoginComponent();
            $loginComponent->show($method);
        }
    }
    
    
        function show($method){
        switch ($method) {
            case 'conteudoInicial':
                $this->conteudoInicial();

                break;
            case 'autenticar':
                $this->autenticar();
                break;
            case 'logout':
                $this->logout();
                break;
            default:
                break;
        }
    }
    
        public function conteudoInicial(){
        try {
            echo'<form  method="post" >   
<!--    <input type="hidden" name="acaoAjax" value="autenticar" />-->
                     <input type="hidden" name="component" value="LoginComponent" />
                     <input type="hidden" name="method" value="autenticar" />
                      
                <label>Email:</label><input type="email" placeholder="seu@email.com" name="user" id="user" required autofocus>                
                <label>Senha:</label><input type="password" placeholder="Digite sua senha" name="senha" id="senha" required > 
                <a href="esqueceu_senha.html">Esqueceu sua senha?</a>
                <button type="submit" name="btn_login" id="btn_login">Entrar</button>

            </form>';
//            href="javascript:document.location=';echo"'"; echo"?component=LoginComponent&method=autenticar'";echo'" 
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } finally {
            
        }
            
        
    }
    public function autenticar(){
        try {
         //   if(isset($_REQUEST['login'])?$_REQUEST['login'] && isset($_REQUEST['senha'])?$_REQUEST['senha']){
//              $_SESSION['user'] = 'gabriel-neto295@hotmail.com';
//            $_SESSION['senha'] = '1234';
//            $user = $_SESSION['user'];
//            $senha  =$_SESSION['senha'];  
          
                
            
            $login = isset($_REQUEST['user'])?$_REQUEST['user']:$_SESSION['user'];
            $senha = isset($_REQUEST['senha'])?$_REQUEST['senha']:$_SESSION['senha'];

            
            //sleep(3);
            date_default_timezone_set('America/Sao_Paulo');
            $dateTime = date("Y-m-d H:i:s"); // Formato americano
            $usuario = new Usuario();
            $arrayUsuarios = $usuario->select("and email_usuario='".$login."' and senha_usuario = '".$senha."'");
            if(count($arrayUsuarios)> 0){
                echo 'sucesso';
        if($arrayUsuarios[0]['cod_status_usuario'] == 'A'){
            $codUsuario = $arrayUsuarios[0]['cod_usuario'];
            $tipoUsuario = new TipoUsuario();
            $arrayTipo = $tipoUsuario->select("and cod_usuario=".$codUsuario);
            if($arrayTipo[0]['nome_tipo_usuario'] == 'A'){
                
                
                //------------------------------------------------------------CARREGAR HOME RESTRITA
                $midia = new midia();
                $array = $midia->select("and cod_usuario=".$codUsuario." and tipo_midia='A'");
                $avatar = $array[0]['url'];
                
                
                
                
                
                
                //------------------------------------------------------------CARREGAR MEU PERFIL
                
                
                
                
                
                
                $nome = $arrayUsuarios[0]['nome_usuario'];
                $aluno = new Aluno();
                $array2 = $aluno->select("and cod_usuario='".$codUsuario."'");
                $apelido = $array2[0]['apelido'];
                $dataNasc = $array2[0]['data_nasc'];
                $redes = $array2[0]['redes_sociais'];
                $frase = $array2[0]['frase'];
                $array_2 = $midia->select("and cod_usuario='".$codUsuario."' and tipo_midia='P'");
                $perfil = $array_2[0]['url'];
                $array_3 = $midia->select("and cod_usuario='".$codUsuario."' and tipo_midia='G'");
                $contadorGaleria = count($array_3);
                $textoFeed = $array2[0]['texto_feed'];


                // --------------------------------------------------------
                
                
                
                
                
                //------------------------------------------------------------CARREGAR PERFIL TURMA
                
                
                
                
                
                
                
                // ----------------- CARREGAR MEMBROS DA TURMA ------------
                $turma = new Turma();
                $array3_1 = $aluno->select("and cod_usuario='".$codUsuario."'");
               $codTurma = $array3_1[0]['cod_turma'];
     //          $_SESSION['testes'] = count($array3_1);
               $_SESSION['cod_turma'] = $codTurma;
               $array4 = $aluno->select("and cod_turma='".$codTurma."'");
               $array5 = $turma->select("and cod_turma='".$codTurma."'");
               $_SESSION['cod_escola'] = $array5[0]['cod_escola'];
//                $contadorLista = count($array4);
//                for($i = 0;$i > $contadorLista;$i++){
//                    $amigo.$i = $array4[$i]['cod_usuario'];
//                    $_SESSION['aluno'.$i] = $amigo.$i;
//                    $amigoNome.$i = $array4[$i]['nome_usuario'];
//                    $_SESSION['alunoNome'.$i] = $amigoNome.$i;
//                    
//                }
                
//                $array3 = $lista->select("and nome='".$nomeTurma."'");
//                $contadorTurma = count($array3); 
//                
//                for($i = 0;$contadorTurma > $i;$i++){
//                    $aluno.$i = $array3[$i]['cod_usuario'];
//                    $array_1 = $usuario->select("and cod_usuario ='".$aluno.$i."'");
//                    $_SESSION['alunoNome'.$i] =$array3_1[0]['nome_usuario'];
//                    $_SESSION['aluno'.$i] = $aluno.$i;
//                }
                // --------------------------------------------------------
                
                
                
               // ----------------- CARREGAR GALERIA ----------------------
                  $turma = new Turma();     
                $array4 = $turma->select("and cod_turma='".$codTurma."'");
//                $codRepresentante = $array4[0]['cod_representante'];
//                $array4_1 = $midia->select("AND cod_usuario='".$codRepresentante."'");
//                $contadorGaleriaTurma = count($array4_1);
//                for($i = 0;$i > $contadorGaleriaTurma;$i++){
//                    $galeriaTurma.$i = $array4_1[$i]['url'];
//                    $_SESSION['galeria'.$i] = $galeriaTurma.$i;
//                }
                // --------------------------------------------------------
                
                // ----------------- CARREGAR OSCAR ----------------------
                       
                $oscar = new Oscar();

                $array5 = $oscar->select("AND cod_turma='".$codTurma."'");
//                $contadorOscar = count($array5);
//                for($i = 0;$i > $contadorOscar;$i++){
//                    $oscarrank.$i = $array5[$i]['titulo'];
//                    $oscarNome.$i = $array5[$i]['cod_aluno'];
//                    $_SESSION['oscar'.$i] = $oscarrank.$i;
//                    $_SESSION['oscarNome'.$i] = $oscarNome.$i;
//                }
                
                // --------------------------------------------------------
                
                
                
                
                
                
                //------------------------------------------------------------CARREGAR PERFIL ESCOLA
                
                
                $escola = new Escola();
                $codEscola = $array4[0]['cod_escola'];
                $array_1 = $usuario->select("AND cod_usuario='".$codEscola."'");
                $nomeEscola = $array_1[0]['nome_usuario'];
                $array6 = $escola->select("and cod_escola ='".$codEscola."'");
                $texto = $array6[0]['texto'];
                
                
                
                //----------------- CARREGAR FUNCIONARIOS -----------
                $_SESSION['cod_escola'] = $codEscola;
//                $funcionario = new Funcionario();
//                $array7 = $funcionario->select("and cod_escola ='".$codEscola."'");
//                $contadorFuncionario = count($array7);
//                if(count($array7) > 0){for($i = 0;$i > $contadorFuncionario; $i++){
//                    $funcioarioNome.$i = $array7[0]['nome'];
//                    $funcionarioCargo.$i = $array7[0]['cargo'];
//                    $_SESSION['funcionario'.$i] = $funcionarioNome.$i;
//                    $_SESSION['funcionarioCargo'.$i] = $funcionarioCargo.$i;
//                    
//                }}
//                $funcioarioNome = 'não há funcionarios';
                
                // ---------------- CARREGAR TURMAS ------------------
 
                $listaTurmas = $turma->select("and cod_escola='".$codEscola."'");
                $contadorTurmaEscola = count($listaTurmas);
                for($i = 0; $i > $contadorTurmaEscola; $i++){
                    $turmas.$i = $listaTurmas[$i]['nome'];
                    $turmaCod.$i = $listaTurmas[$i]['cod_turma'];
                    $_SESSION['turma'.$i] = $turmas.$i;
                    $_SESSION['turmaCod'.$i] = $turmaCod.$i;
                }
            }elseif ($arrayTipo[0]['nome_tipo_usuario'] == 'R') {
                
                         //------------------------------------------------------------CARREGAR PERFIL TURMA
                
                
                
                
                
                
                
                // ----------------- CARREGAR MEMBROS DA TURMA ------------
                $turma = new Turma();
                $aluno = new Aluno();
                $array3_1 = $turma->select("and cod_usuario='".$codUsuario."'");
                $codTurma = $array3_1[0]['cod_turma'];
                $_SESSION['cod_turma'] = $codTurma;
                $array4 = $aluno->select("and cod_turma='".$codTurma."'");
                $contadorLista = count($array4);
                for($i = 0;$i > $contadorLista;$i++){
                    $amigo.$i = $array4[$i]['cod_usuario'];
                    $_SESSION['aluno'.$i] = $amigo.$i;
                    $amigoNome.$i = $array4[$i]['nome_usuario'];
                    $_SESSION['alunoNome'.$i] = $amigoNome.$i;
                    
                }
                
//                $array3 = $lista->select("and nome='".$nomeTurma."'");
//                $contadorTurma = count($array3); 
//                for($i = 0;$contadorTurma > $i;$i++){
//                    $aluno.$i = $array3[$i]['cod_usuario'];
//                    $array_1 = $usuario->select("and cod_usuario ='".$aluno.$i."'");
//                    $_SESSION['alunoNome'.$i] =$array3_1[0]['nome_usuario'];
//                    $_SESSION['aluno'.$i] = $aluno.$i;
//                }
                // --------------------------------------------------------
                
                
                
               // ----------------- CARREGAR GALERIA ----------------------
                       $midia = new Midia();
                $array4 = $turma->select("and cod_turma='".$codTurma."'");
                $codRepresentante = $array4[0]['cod_representante'];
                $array4_1 = $midia->select("AND cod_usuario='".$codRepresentante."'");
                $contadorGaleriaTurma = count($array4_1);
                for($i = 0;$i > $contadorGaleriaTurma;$i++){
                    $galeriaTurma.$i = $array4_1[$i]['url'];
                    $_SESSION['galeria'.$i] = $galeriaTurma.$i;
                }
                // --------------------------------------------------------
                
                // ----------------- CARREGAR OSCAR ----------------------
                       
                $oscar = new Oscar();
                $array5 = $oscar->select("AND cod_turma='".$codTurma."'");
                $contadorOscar = count($array5);
                for($i = 0;$i > $contadorOscar;$i++){
                    $oscar.$i = $array5[$i]['titulo'];
                    $oscarNome.$i = $array5[$i]['usuario'];
                    $_SESSION['oscar'.$i] = $oscar.$i;
                    $_SESSION['oscarNome'.$i] = $oscarNome.$i;
                }
                
                // --------------------------------------------------------
                
                
                
                    } else {
                     
                //------------------------------------------------------------CARREGAR PERFIL ESCOLA
                
                
                $escola = new Escola();
                $array6 = $escola->select("and cod_usuario='".$codUsuario."'");
                $codEscola = $array6_1['cod_escola'];
                $_SESSION['cod_escola'] = $codEscola;
                $nomeEscola = $arrayUsuarios[0]['nome_usuario'];
                $texto = $array6[0]['texto'];
                
                
                
                //----------------- CARREGAR FUNCIONARIOS -----------
                
                $funcionario = new Funcionario();
                $array7 = $funcionario->select("and cod_escola ='".$codEscola."'");
                $contadorFuncionario = count($array7);
                for($i = 0;$i > $contadorFuncionario; $i++){
                    $funcioario.$i = $array7[0]['nome'];
                    $funcionarioCargo.$i = $array7[0]['cargo'];
                    $_SESSION['funcionario'.$i] = $funcionario.$i;
                    $_SESSION['funcionarioCargo'.$i] = $funcionarioCargo.$i;
                    
                }
                
                // ---------------- CARREGAR TURMAS ------------------
                $turma = new Turma();
                $listaTurmas = $turma->select("and cod_escola='".$codEscola."'");
                $contadorTurmaEscola = count($listaTurmas);
                for($i = 0; $i > $contadorTurmaEscola; $i++){
                    $turmas.$i = $listaTurmas[$i]['nome'];
                    $turmaCod.$i = $listaTurmas[$i]['cod_turma'];
                    $_SESSION['turma'.$i] = $turmas.$i;
                    $_SESSION['turmaCod'.$i] = $turmaCod.$i;
                }
                        
                        
                    }
            
            
//            $log = new Log();
//            $log->setCodStatusAcesso('A');
//            $log->setDataHoraInicioAcesso($dateTime);
//            $log->setCodUsuario($arrayUsuarios[0]['cod_usuario']);
//            $log->insert();

            $_SESSION['cod_turma'] = $codTurma;
            $_SESSION['email_usuario'] = $arrayUsuarios[0]['user'];
            $_SESSION['senha_usuario'] = $arrayUsuarios[0]['senha'];
            $_SESSION['cod_usuario'] = $codUsuario;
            $_SESSION['avatar'] = $avatar;
            $_SESSION['apelido'] = $apelido;
            $_SESSION['dataNasc'] = $dataNasc;
            $_SESSION['redes'] = $redes;
            $_SESSION['frase'] = $frase;
            $_SESSION['perfil'] = $perfil;
            $_SESSION['texto_feed'] = $textoFeed;
            $_SESSION['texto'] = $texto;
           // $_SESSION['contador'] = $contador;
            $_SESSION['contador_turma'] = $contadorTurma;
            $_SESSION['contador_turma_escola'] = $contadorTurmaEscola;
            $_SESSION['contador_funcionario'] = $contadorFuncionario; 
            $_SESSION['contador_galeria'] = $contadorGaleria;
            $_SESSION['contador_galeria_turma'] = $contadorGaleriaTurma;
            $_SESSION['contador_lista'] = $contadorLista;
            $_SESSION['contador_oscar'] = $contadorOscar;
            $_SESSION['nome_escola'] = $nomeEscola;
            $_SESSION['nome_usuario'] = $nome;
            $_SESSION['tipo_usuario'] = $arrayTipo[0]['nome_tipo_usuario'];
            $_SESSION['logado'] = 'pagode';
//            $_SESSION['ultimoCodLog'] = $log->getUltimoCod();
          //  echo 'teste1';
            //echo $log->getUltimoCod();
            echo '<script>';
             echo "location.href='index.php?component=HomeRestritoComponent&method=conteudoInicial&tpl=home-restrito.html'";
            echo '</script>';
       // echo '<font color=blue>Sucesso</font>';
            //echo $log->getUltimoCod();
             
        }elseif($arrayUsuarios[0]['cod_status_usuario'] == 'I'){
         //   echo 'teste2';
            echo '<script>';
             echo "location.href='index.php?falho=falho&method2=ContaInativa'";
            echo '</script>';
        }     
    }else{
        // echo 'teste3';
            echo '<script>';
             echo "location.href='index.php?falho=falho&method2=SenhaIncorreta'";
            echo '</script>';
            }
            
//    }else {
  //  echo 'teste4';      
//                echo '<script>';
//            echo "location.href='index.php?component=HomeRestritoComponent&method=Sememail";
//            echo '</script>';
//            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } finally {
            
        }      
    }
    
     public function logout(){
         echo 'teste';
//       date_default_timezone_set('America/Sao_Paulo');
//        $dateTime = date("Y-m-d H:i:s");
//        $log = new Log();
//        $log->setCodLog($_SESSION['ultimoCodLog']);
//        $log->setDataHoraFimAcesso($dateTime);
//        $log->insertLogout();
       session_destroy();
         echo '<script>';
         echo "location.href='index.php'";
            echo '</script>';
   }
    
    
    
    
    
}
            

LoginComponent::run();