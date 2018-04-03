<?php

namespace Components\Module_restrito;
if(!session_start()){
            session_start();
            
        }
//        if($_SESSION['aluno']){
 //           $codUsuario = $_SESSION['aluno'];
//        }else{
            $codUsuario = $_SESSION['cod_usuario'];
//        }
            use Core\Usuario;
            use Core\Aluno;
            use Core\Midia;
            use Core\Turma;
class PerfilComponent {
    
    //Lógica para trabalhar com Ajax
    
    static public function run(){
     
        if($_REQUEST){
            $method = isset ($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $perfilComponent = new PerfilComponent();
            $perfilComponent->show($method);
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
           if(isset($_SESSION['logado'])){
               
               
           
            try {
                
                if(isset($_REQUEST['cod-usuario'])){
                    $codUsuario = $_REQUEST['cod-usuario'];
                }else{
                    $codUsuario = $_SESSION['cod_usuario'];
                }
                $usuario = new Usuario();
                $json = $usuario->select("and cod_usuario='{$codUsuario}'");
                $nome_usuario = $json[0]['nome_usuario'];
                $aluno = new Aluno();
                $json = $aluno->select("and cod_usuario='{$codUsuario}'");
                $dataNasc = $json[0]['data_nasc'];
                $apelido = $json[0]['apelido'];
                $redes = $json[0]['redes_sociais'];
                $frase = $json[0]['frase'];
                $texto_feed = $json[0]['texto_feed'];
                 $midia = new Midia();
                $arrayPerfil = $midia->select("and cod_usuario = '{$codUsuario}' and tipo_midia='P'");
                $perfil = $arrayPerfil[0]['url'];
                //echo $array_3[0]['url'];
//                $turma = new Turma();
//                $array3_1 = $turma->select("and cod_usuario='".$codUsuario."'");
//                $codRepresentante = $array3_1[0]['cod_representante'];
//                $array3_2 = $turma->select("and cod_representante='".$codRepresentante."'");
//               // $contadorRepresentante = count($array3_1);
//                for($i = 0;$i > $contadorRepresentante;$i++){
//                    $codUsuario.$i= $array3_2[$i]['cod_usuario'];
//                }
//                for($i = 0;$i > $contadorRepresentante;$i++){
//                     $array3 = $aluno->select("and cod_usuario='".$codUsuario.$i."'");
//                    $amigo.$i = $array3[0]['cod_usuario'];                    
//                    $_SESSION['aluno'.$i] = $amigo.$i;
//                    $amigoNome.$i = $array3[0]['nome_usuario'];
//                    $_SESSION['alunoNome'.$i] = $amigoNome.$i;
//
//                }
//                foreach ($_SESSION as $key => $value) {
//    print($key.' - '.$value.'<br>');
//};
//
//foreach ($_COOKIE as $key => $value) {
//    print($key.' - '.$value.'<br>');
//};  
                echo '
                    <div id="bg_alu">
            <div id="nome">
                <h1>'.$nome_usuario.'</h1>
                <img src="'.$perfil.'" alt="Perfil aluno">
                <a href="#"></a>
                <ul>
                    <li>'.$dataNasc.'</li>
                    <li>'.$redes.'</li>
                    <li>'.$apelido.'</li>
                    <li>'.$frase.'</li>
                </ul>
            </div>
            <div id="turma">
                <h1>Turma</h1>
                <ul>';
              $aluno = new Aluno();   
                $usuario = new Usuario();
                $turma = new Turma();
                $array3_1 = $aluno->select("and cod_usuario='".$_SESSION['cod_usuario']."'");
                $array4 = $turma->select ("and cod_turma='".$_SESSION['cod_turma']."'");
                $codRepresentante = $array4[0]['cod_representante'];
                $array3_2 = $aluno->select("and cod_turma='".$_SESSION['cod_turma']."'");
                $contadorR = count($array3_2);
   //echo $contadorRepresentante;   
                $alunoNome1 = '';
                for($i = 0;$i < $contadorR;$i++){
                    $codUsuario1 = $array3_2[$i]['cod_usuario'];
                     $array3 = $usuario->select("and cod_usuario='".$codUsuario1."'");
                     //echo count($array3);
                     $amigo1 = $array3[0]['cod_usuario'];       
                   echo' <li>
                    <a href="javascript:document.location=';echo"'";echo'?component=PerfilComponent&method=conteudoInicial&cod-usuario='.$amigo1.'&tpl=perfil_restrito.html';echo"'";echo'">
                        '.$array3[0]['nome_usuario'].'
                    </a>
                </li>';
                }
                    
                  echo'  
                </ul>
            </div>
        </div>
        <div id="fotos">
            <a href="#"></a>
            ';
                  
                $array_3 = $midia->select("and cod_usuario='{$codUsuario}' and tipo_midia='G'");
                $contadorGaleria = count($array_3);
                
                for($i = 0;$i < $contadorGaleria;$i++){
   
                    $galeria = $array_3[$i]['url'];
                     echo '<img src="'. $galeria .'" alt="Galeria">';
                   
                }
            
                echo'
            <a href="#"></a>
        </div>
        <div id="bg_status">
            <div id="status">
                <h1>Status</h1>
                <p class="caralho">
                    '.$texto_feed.'
                </p>              
            </div>
        </div>';
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }
            
            
            
        }
        else{
            
            echo '<script>';
              echo "location.href='index.php'";
            echo '</script>';
            
        }
        
        
            }
}
PerfilComponent::run();