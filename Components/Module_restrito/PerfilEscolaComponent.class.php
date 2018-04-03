<?php

namespace Components\Module_restrito;

if(!session_start()){
            session_start();
        }
        use Core\Funcionario;
        use Core\Turma;
        use Core\Escola;
        use Core\Usuario;
class PerfilEscolaComponent {
    
    //Lógica para trabalhar com Ajax
    
    static public function run(){
     
        if($_REQUEST){
            $method = isset ($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $perfilEscolaComponent = new PerfilEscolaComponent();
            $perfilEscolaComponent->show($method);
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
//                                foreach ($_SESSION as $key => $value) {
//    print($key.' - '.$value.'<br>');
//};
//
//foreach ($_COOKIE as $key => $value) {
//    print($key.' - '.$value.'<br>');
//};           
                  if(isset($_GET['cod-escola']))  {
                      $codEscola = $_GET['cod-escola'];
                  }else{
                      $codEscola = $_SESSION['cod_escola'];
                  }
                $escola = new Escola();
                $usuario = new Usuario();
                $array = $escola->select("and cod_escola='".$codEscola."'");
                $codUsuarioEscola = $array[0]['cod_usuario'];
                $array2 = $usuario->select("and cod_usuario='".$codUsuarioEscola."'");
                $nomeEscola = $array2[0]['nome_usuario'];
               echo'
                   <div id="bg_escola2">
            <h1>'.$nomeEscola.'</h1>
            <div id="escola2">
                <p id="i_p_pep" class="texto_e">
                '.$_SESSION['texto'].'
                </p>
            </div>
        </div>
        <div id="bg_cargos">
        <h1 id="i_h1_pep">Funcionários</h1>    ';
               $funcionario = new Funcionario();
                $array7 = $funcionario->select("and cod_escola ='".$codEscola."'");
                $contadorFuncionario = count($array7);
                if($contadorFuncionario > 0){
                    for($i = 0;$i < $contadorFuncionario; $i++){
                    $funcionarioCod = $array7[$i]['cod_funcionario'];
                    $funcionarioNome = $array7[$i]['nome'];
                    $funcionarioCargo = $array7[$i]['cargo'];
                    $funcionarioMidia = $array7[$i]['url'];
                    
                    echo'  
                                <div class="cargos_2">
                                <img src="'.$funcionarioMidia.'" alt="não sei">
                                  <ul>
                                  <li>Nome - '.$funcionarioNome.'</li>
                                  <li id="i_li_pep>Cargo - '.$funcionarioCargo.'</li><br>
                                  
                                  </ul>              
                                 </div>
                                 </div>   ';  
                }}else{
                $funcionarioNome = 'não há funcionarios';
                echo'  <div id="bg_cargos">
                                <div class="cargos_2">
                                <img src="images/a.jpg" alt="não sei">
                                  <ul>
                                  <li>'.$funcionarioNome.'</li>
                                  </ul>              
                                 </div>
                </div>   '; } 
                       
                       
                       echo'
        
        <div id="turmas_Esc">
            <h1>Turmas da Escola</h1>
            <ul>
               ';   
                       $turma = new Turma();
                       
                 $listaTurmas = $turma->select("and cod_escola='".$codEscola."'");
                $contadorTurmaEscola = count($listaTurmas);
                for($i = 0; $i < $contadorTurmaEscola; $i++){
                    $turmas = $listaTurmas[$i]['nome'];
                    $turmaCod = $listaTurmas[$i]['cod_turma'];
                   echo' <li>
                    <a class="turma" href="javascript:document.location=';echo"'";echo'?component=PerfilTurmaComponent&method=conteudoInicial&cod-turma='.$turmaCod.'&tpl=Turma-restrito.html';echo"'";echo'">
                        '.$turmas.'
                    </a>
                    </li>';
                }

                       echo'
                
     
  
            </ul>
        </div>';
                       
                    
            
                
//            echo'<div id="bg_escola">
//            <h1>'.$_SESSION['nome_escola'].'</h1>
//            <div id="escola">
//                <p>
//                '.$_SESSION['texto'].'
//                </p>
//            </div>
//        </div>';
//               $funcionario = new Funcionario();
//               $escola = new Escola();
//               $array = $escola->select("and cod_usuario='".$_SESSION['cod_usuario']."'");
//               $codEscola = $array[0]['cod_escola'];
//                $array7 = $funcionario->select("and cod_escola ='".$codEscola."'");
//                $contadorFuncionario = count($array7);
//                if($contadorFuncionario > 0){
//                    for($i = 0;$i < $contadorFuncionario; $i++){
//                    $funcionarioCod = $array7[$i]['cod_funcionario'];
//                    $funcionarioNome = $array7[$i]['nome'];
//                    $funcionarioCargo = $array7[$i]['cargo'];
//                    $funcionarioMidia = $array7[$i]['url'];
//                    echo'  <div id="bg_cargos">
//                                <div class="cargos_2">
//                                <img src="'.$funcionarioMidia.'" alt="não sei">
//                                  <ul>
//                                  <li>Nome - '.$funcionarioNome.'</li>
//                                  <li>Cargo - '.$funcionarioCargo.'</li><br>
//                                  
//                                  </ul>              
//                                 </div>
//                                 </div>   ';  
//                }}else{
//                $funcionarioNome = 'não há funcionarios';
//                echo'  <div id="bg_cargos">
//                                <div class="cargos_2">
//                                <img src="images/a.jpg" alt="não sei">
//                                  <ul>
//                                  <li>'.$funcionarioNome.'</li>
//                                  </ul>              
//                                 </div>
//                </div>   '; } 
//                       
//                       
//                       echo'
//        
//        <div id="turmas_Esc">
//            <h1>Turmas da Escola</h1>
//            <ul>
//               ';   
//                       $turma = new Turma();
//                       
//                 $listaTurmas = $turma->select("and cod_escola='".$codEscola."'");
//                $contadorTurmaEscola = count($listaTurmas);
//                for($i = 0; $i < $contadorTurmaEscola; $i++){
//                    $turmas = $listaTurmas[$i]['nome'];
//                    $turmaCod = $listaTurmas[$i]['cod_turma'];
//                   echo' <li>
//                    <a href="javascript:document.location=';echo"'";echo'?component=PerfilTurmaComponent&method=conteudoInicial&cod-turma='.$turmaCod.'&tpl=Turma-restrito.html';echo"'";echo'">
//                        '.$turmas.'
//                    </a>';
//                }
//
//                       echo'
//                </li>
//     
//  
//            </ul>
//        </div>';
            
            
        
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }}
        else{
            
            echo '<script>';
              echo "location.href='index.php'";
            echo '</script>';
            
        }
}}
PerfilEscolaComponent::run();

//$turma = $json[0]['turma'];
               
//               $json = $aluno->select ("and turma=". $turma);
//               $contador = count($json);
//               for($i = 0;$i > $contador;$i++){
//                   $aluno.$i = $json[$i]['cod_usuario'];
//                   $json2 = $usuario->select("and cod_usuario=". $aluno.$i);
//                   $alunoNome.$i = $json2[$i]['nome_usuario'];
//               }