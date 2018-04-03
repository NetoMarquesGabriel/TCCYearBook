<?php 
namespace Components\Module_restrito;


        
        use core\Turma;
        use Core\Aluno;
        use Core\Usuario;
        use Core\Midia;
        use Core\Oscar;
class PerfilTurmaEComponent {
    
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
            case 'uparFoto':
                $this->uparFoto();        

                break;
            
            case 'apagarFoto':
                $this->apagarFoto();        

                break;
            case 'adicionarOscar':
                $this->adicionarOscar();        

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
                echo '
            
        </header>
        <hr class="hr_HR">
        <div id="bg_turma">
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
                //echo $codRepresentante;
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
            <li><a href="javascript:document.location=';echo"'";echo'?component=PerfilTurmaComponent&method=conteudoInicial&cod-turma='.$codTurma.'&tpl=turma-restrito.html';echo"'";echo'">Ver perfil público</a></li>
        </div>
        <div id="fotos2">
            <a href="#"></a>';
            $midia = new Midia();
           
            $array = $midia->select("and cod_usuario ='".$codRepresentante."' and tipo_midia = 'G'");
            $contadorGaleria = count($array);
            for($i = 0;$i < $contadorGaleria;$i++){
              echo ' <img src="'.$array[$i]['url'].'" alt="Galeria">';
              echo '<br> <a href="javascript:document.location=';echo"'";echo'?component=PerfilTurmaEComponent&method=apagarFoto&cod-midia='.$array[$i]['cod_midia'].'&tpl=turma-restrito-E.html';echo"'";echo'">Apagar</a></h3>'; 
            }
            echo'
                

            <form method="post" enctype="multipart/form-data">
            <h2 style="text-align:center">Adicione uma Foto</h2>
             <input type="hidden" name="component" value="PerfilTurmaEComponent" />
             <input type="hidden" name="method" value="uparFoto" />
              <input class="img_func" type="file" name="fileToUpload" id="fileToUpload">
                
               <button type="submit" name="btn_login">Salvar</button>
            </form>
            

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
                        for($i = 0;$i < $contadorOscar;$i++){
                        $oscar1 = $array5[$i]['titulo'];
                        $codAluno = $array5[$i]['cod_aluno'];
                        $array5_1 = $aluno->select("and cod_aluno='".$codAluno."'");
                        $codUsuario2 = $array5_1[0]['cod_usuario'];
                        $array5_2 = $usuario->select("and cod_usuario ='".$codUsuario2."'");
                        $midia = new Midia();
                        $array5_3 = $midia->select("and cod_usuario ='".$codUsuario2."' and tipo_midia='P'");
                        $oscarNome1 = $array5_2[0]['nome_usuario'];
                        echo '<img class="oscar" src="'.$array5_3[0]['url'].'" alt="oscar">
                        <img class="trofeu" src="images/trofeu.png" alt="trofeu"><br>';
                        echo $oscar1.' é o '.$oscarNome1.'<br>';
                        }
                            echo'<br><br><br>
                            <form method="post" enctype="multipart/form-data">
            <h2 style="text-align:center">Adicione um Oscar</h2>
             <input type="hidden" name="component" value="PerfilTurmaEComponent" />
             <input type="hidden" name="method" value="adicionarOscar" />
              <label>Nome Completo do Aluno: </label><br><input id="i_inp3_ee" type="text" placeholder="nome aqui" name="nome" required autofocus><br>
              <label>O Oscar que ele merece: </label><br><input id="i_inp4_ee" type="text" placeholder="titulo aqui" name="oscar" required ><br>
                
               <button type="submit" name="btn_login">Salvar</button>
            </form>    
                    </ul>
                </div>                             
            </div>
        </div>';
               
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }}
        else{
            echo '<script>';
              echo "location.href='index.php'";
            echo '</script>';
            
        }
    }
    public function uparFoto() {
    try {
        $midia = new Midia();
        $turma = new Turma();
                if(isset($_GET['cod-turma'])){
                    $codTurma = $_GET['cod-turma'];
                }else{
                    $codTurma = $_SESSION['cod_turma'];
                }
        $array4 = $turma->select ("and cod_turma='".$codTurma."'");
        $codRepresentante = $array4[0]['cod_representante'];
       
        
        $midia->setCodUsuario($codRepresentante);
        $midia->setCodStatusMidia('A');
        $midia->setTipoMidia('G');
        
        
                        $target_dir = "Uploads/";
                        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                        // verifica se imagem é verdadeira 
                        if(isset($_POST["submit"])) {
                            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                            if($check !== false) {
        
                                $uploadOk = 1;
                            } else {
                                echo "Arquivo não é uma imagem.<br/>";
                                $uploadOk = 0;
                            }
                        }
                        // verifica se imagem ja existe
                        if (file_exists($target_file)) {
                            echo "desculpe,arquivo já existe<br/>";
                            $uploadOk = 0;
                        }
                        // verifica tamanho de imagem
                        if ($_FILES["fileToUpload"]["size"] > 1000000) {
                            echo "desculpe,arquivo é muito grande<br/>";
                            $uploadOk = 0;
                        }
                        // verifica se são formatos permitidos
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                            echo "desculpe,somente JPG, JPEG, PNG & GIF são suportados<br/>";
                            $uploadOk = 0;
                        }
                        // se uploadOk for 0 não faz o upload
                        if ($uploadOk == 0) {
                            echo "desculpe,arquivo não upado<br/>";
                        // if everything is ok, try to upload file
                        } else {
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                               $midia->setUrl($target_file);
                            } else {
                                echo "Sorry, ouve um erro";
    }
    if($midia->insert()){
                echo 'foto cadastrada<br>';
                echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
            }
            else{
                echo 'Falha em Atualizar<br>';
                echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
            }
                        }
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}
   
}
public function apagarFoto() {
    $midia = new Midia();
    $midia->setCodMidia($_GET['cod-midia']);
    if($midia->delete()){
                echo 'foto deletada<br>';
                echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
            }
            else{
                echo 'Falha em Atualizar<br>';
                echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
            }
    
}
public function adicionarOscar(){
    try {
   
        $nome = $_REQUEST['nome'];
        $usuario = new Usuario();
        $array = $usuario->select("and nome_usuario LIKE '".$nome."'");
        if(count($array) > 0){
            $aluno = new Aluno();
            $array2 = $aluno->select("and cod_usuario = '".$array[0]['cod_usuario']."'");
            echo"<br><br><br><br><br><br>".count($array2);
            $oscar = new Oscar();
            $oscar->setTitulo($_REQUEST['oscar']);
            $oscar->setCodAluno($array2[0]['cod_aluno']);
            $oscar->setCodTurma($array2[0]['cod_turma']);
            $oscar->setCodStatusOscar('A');
            if($oscar->insert()){
                echo 'Oscar Inserido<br>';
                echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
            }
            else{
                echo 'Falha em Atualizar<br>';
                echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
            }
        }
        
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
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