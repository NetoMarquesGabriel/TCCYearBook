<?php

namespace Components\Module_restrito;
if(!session_start()){
            session_start();
        }
        use core\Turma;
        use Core\Aluno;
        use Core\Usuario;
        use Core\Midia;
        use Core\Oscar;
class PerfilTurmaComponent {
    
    //Lógica para trabalhar com Ajax
    
    static public function run(){
     
        if($_REQUEST){
            $method = isset ($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $perfilTurmaComponent = new PerfilTurmaComponent();
            $perfilTurmaComponent->show($method);
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
//                foreach ($_SESSION as $key => $value) {
//    print($key.' - '.$value.'<br>');
//};
//
//foreach ($_COOKIE as $key => $value) {
//    print($key.' - '.$value.'<br>');
//};  
                echo '<div id="bg_turma">
            <div id="turma2">
                <h1 id="i_h1_te">Turma</h1>
                <ul>

                    ';
                $aluno = new Aluno();   
                $usuario = new Usuario();
                $turma = new Turma();
                if(isset($_GET['cod-turma'])){
                    $codTurma = $_GET['cod-turma'];
                }else{
                    $codTurma = $_SESSION['cod_turma'];
                }
                    $array4 = $turma->select ("and cod_turma='".$codTurma."'");
                $codRepresentante = $array4[0]['cod_representante'];
                $array3_2 = $aluno->select("and cod_turma='".$codTurma."'");
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
               $codEscola = $array4[0]['cod_escola'];
               
                
    

               
                echo'
                </ul>
                <h3 id="i_h3_te"><a href="javascript:document.location=';echo"'";echo'?component=PerfilEscolaComponent&method=conteudoInicial&cod-escola='.$codEscola.'&tpl=escola-comum.html';echo"'";echo'">Ver escola da turma</a></h3>
            </div>
        </div>
        <div id="fotos2">
            <a href="#"></a>';
            $midia = new Midia();
            $array = $midia->select("and cod_usuario ='".$codRepresentante."' and tipo_midia = 'G'");
            $contadorGaleria = count($array);
            
            if($contadorGaleria > 0){
              for($i=0;$i < $contadorGaleria;$i++){
              echo ' <img src="'.$array[$i]['url'].'" alt="Galeria">';
                
            }  
            }else{
                echo '<h1>não há imagens na galeria!</h1>';
            }
            
            echo'
            <a href="#"></a>
        </div>
        <div id="bg_oscar">
            <div id="oscar">
                <h1>Oscar</h1>
                <a href="#"></a>
                <div id="aux_4">
                    <ul>    
                        <li>
                        ';
                        $oscar = new Oscar();
                        $array5 = $oscar->select("AND cod_turma='".$codTurma."'");
                        $contadorOscar = count($array5);
                        if($contadorOscar > 0){
                        for($i = 0;$i < $contadorOscar;$i++){
                        $oscar1 = $array5[$i]['titulo'];
                        $codAluno = $array5[$i]['cod_aluno'];
                        $array5_1 = $aluno->select("and cod_aluno='".$codAluno."'");
                        $codUsuario2 = $array5_1[0]['cod_usuario'];
                        $array5_2 = $usuario->select("and cod_usuario ='".$codUsuario2."'");
                        $oscarNome1 = $array5_2[0]['nome_usuario'];
                        echo '<img class="trofeu" src="images/trofeu.png" alt="trofeu">';
                        echo $oscar1.' é o '.$oscarNome1.'<br>';
                        }}else{
                            echo '<br><h1>não há Oscars!</h1>';
                        }
                            echo'
                    </ul>
                </div>                             
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
PerfilTurmaComponent::run();

//$turma = $json[0]['turma'];
               
//               $json = $aluno->select ("and turma=". $turma);
//               $contador = count($json);
//               for($i = 0;$i > $contador;$i++){
//                   $aluno.$i = $json[$i]['cod_usuario'];
//                   $json2 = $usuario->select("and cod_usuario=". $aluno.$i);
//                   $alunoNome.$i = $json2[$i]['nome_usuario'];
//               }