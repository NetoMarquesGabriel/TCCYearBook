<?php

namespace Components\Module_restrito;
            use Core\Aluno;
            use Core\Midia;
            use Core\Usuario;
class PerfilEComponent {
    
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
            case 'editarInformacoes':
                $this->editarInformacoes();        

                break;
             case 'uparFoto':
                $this->uparFoto();        

                break;
            case 'apagarFoto':
                $this->apagarFoto();        

                break;
            case 'atualizarStatus':
                $this->atualizarStatus();        

                break;
            case 'atualizarPerfil':
                $this->atualizarPerfil();        

                break;

            default:
                break;
        }
        
        
            
        }
        public function conteudoInicial() {
         if(isset($_SESSION['logado'])){
            try {
//                foreach ($_SESSION as $key => $value) {
//                print($key.' - '.$value.'<br>');
//                };
//
//                foreach ($_COOKIE as $key => $value) {
//                print($key.' - '.$value.'<br>');
//                };  
                echo '<hr class="hr_HR">
        <div id="tudo">
        <div id="bg_aluno">
            <div id="nome_E">';
                $usuario = new Usuario;
                $array = $usuario->select("AND cod_usuario='".$_SESSION['cod_usuario']."'");
                echo '<h1 id="i_h1_pae">'.$array[0]['nome_usuario'].'</h1>';
                $midia = new Midia();
                $array2 = $midia->select("and cod_usuario ='".$_SESSION['cod_usuario']."' and tipo_midia = 'P'");
                $url = $array2[0]['url'];
                //echo $url;
                echo'
                    
                <img src="'.$url.'" alt="Perfil aluno">
                    <div style="display:none" class="aparece">
                    <form method="post" enctype="multipart/form-data">
                <h5 style="text-align:center">Atualize sua foto de perfil</h5>
             <input type="hidden" name="component" value="PerfilEComponent" />
             <input type="hidden" name="method" value="uparFoto" />
              <input class="img_func" type="file" name="fileToUpload" id="fileToUpload">
                
               <button type="submit" name="btn_login">Salvar</button>
            </form>
            </div>
                        
                <a id="ed"></a>
                <ul>
                <form method="post">
                <div id="E">  
                
                <li><input type="hidden" name="component" value="PerfilEComponent" /></li>
                <li><input type="hidden" name="method" value="editarInformacoes" /></li>
                <li><label style="color:white"> Data de nascimento: -</label><br><input type="date" placeholder="Data de nascimento" name="data_nascimento"></li>
                <li><label style="color:white"> Redes Sociais: -</label><br><input type="text" placeholder="Redes Sociais" name="redes_sociais"></li>
                <li><label style="color:white"> Apelido: -</label><br><input type="text" placeholder="Apelido" name="apelido" >  </li>
                <li><label style="color:white"> frase de sua vida: -</label><br><input type="text" placeholder="Frase" name="frase">    </li>
                
                </div>
                
                <button  id="i_a_pae" type="submit" name="btn_login" >Salvar</button>
                </form> 
                <a id="i_a2_pae" href="javascript:document.location=';echo"'";echo'?component=PerfilComponent&method=conteudoInicial&cod-usuario='.$_SESSION['cod_usuario'].'&tpl=perfil_restrito.html';echo"'";echo'">
                    Ver seu perfil público
                    </a>
                </ul>
                

            </div>
        </div>
        <div id="fotos">';
        $midia = new Midia();
            $array = $midia->select("and cod_usuario ='".$_SESSION['cod_usuario']."' and tipo_midia = 'G'");
            $contadorGaleria = count($array);
            for($i = 0;$i < $contadorGaleria;$i++){
              echo ' <img src="'.$array[$i]['url'].'" alt="Galeria">';
              echo ' <a href="javascript:document.location=';echo"'";echo'?component=PerfilEComponent&method=apagarFoto&cod-midia='.$array[$i]['cod_midia'].'&tpl=perfil_restrito_E.html';echo"'";echo'">Apagar</a></h3>'; 
            }
            echo'
                <form method="post" enctype="multipart/form-data">
            <h2 style="text-align:center">Adicione uma Foto</h2>
             <input type="hidden" name="component" value="PerfilEComponent" />
             <input type="hidden" name="method" value="uparFoto" />
              <input class="img_func" type="file" name="fileToUpload" id="fileToUpload">
                
               <button type="submit" name="btn_login">Salvar</button>
            </form>
            
        </div>
        <div id="bg_status_E">
            <div id="status_E">
                <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="component" value="PerfilEComponent" />
                 <input type="hidden" name="method" value="atualizarStatus" />
                <h1>Status</h1> <a id="ed_2" href="#"></a>
                <input type="text" placeholder="Atualize seu Status com no maximo 500 caracteres" name="status">  
                <button type="submit" name="btn_login">Atualizar</button>
            </div> </div>';
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
    public function editarInformacoes() {
        $aluno = new Aluno();
        $aluno->setCodUsuario($_SESSION['cod_usuario']);
        $array = $aluno->select("and cod_usuario='".$_SESSION['cod_usuario']."'");
        $aluno->setCodAluno($array[0]['cod_aluno']);
        $aluno->setCodStatusAluno('A');
        $aluno->setCodTurma($array[0]['cod_turma']);
        $aluno->setDataNasc($array[0]['data_nasc']);
        $aluno->setFrase($array[0]['frase']);
        $aluno->setRedesSociais($array[0]['redes_sociais']);
        $aluno->setTextoFeed($array[0]['texto_feed']);
        $aluno->setApelido($array[0]['apelido']);
//        
        if(isset($_REQUEST['data_nascimento'])){
         $aluno->setDataNasc($_REQUEST['data_nascimento']); 
           
        }
        if(isset($_REQUEST['redes_sociais'])){
         $aluno->setRedesSociais($_REQUEST['redes_sociais']);
            
        }
        if(isset($_REQUEST['apelido'])){
        $aluno->setApelido($_REQUEST['apelido']); 
            
        }
        if(isset($_REQUEST['frase'])){
         $aluno->setFrase($_REQUEST['frase']); 
            
        }
        if($aluno->update()){
                echo 'Dados cadastrados, Relogue novamente para ver as atualizações<br>';
                echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
            }
            else{
                echo 'Falha em Atualizar<br>';
                echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
            }
        
    }
    public function uparFoto() {
        try {
            $midia = new Midia();
        $midia->setCodUsuario($_SESSION['cod_usuario']);
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
                        }}
    if($midia->insert()){
                echo 'foto cadastrada<br>';
                echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
            }
            else{
                echo 'Falha em Atualizar<br>';
                echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
            }
                        
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}
   
}

public function apagarFoto() {
    try {
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
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

public function atualizarStatus(){
        $aluno = new Aluno();
        $aluno->setCodUsuario($_SESSION['cod_usuario']);
        $array = $aluno->select("and cod_usuario='".$_SESSION['cod_usuario']."'");
        $aluno->setCodAluno($array[0]['cod_aluno']);
        $aluno->setCodStatusAluno('A');
        $aluno->setCodTurma($array[0]['cod_turma']);
        $aluno->setDataNasc($array[0]['data_nasc']);
        $aluno->setFrase($array[0]['frase']);
        $aluno->setRedesSociais($array[0]['redes_sociais']);
        $textoFeed = $_REQUEST['status'];
        $aluno->setTextoFeed($textoFeed);
        $aluno->setApelido($array[0]['apelido']);
        
//        echo $aluno->getApelido() .'<br>';
//        echo $aluno->getCodAluno().'<br>';
//        echo $aluno->getCodStatusAluno().'<br>';
//        echo $aluno->getCodTurma().'<br>';
//        echo $aluno->getCodUsuario().'<br>';
//        echo $aluno->getDataNasc().'<br>';
//        echo $aluno->getFrase().'<br>';
//        echo $aluno->getRedesSociais().'<br>';
//        echo $aluno->getTextoFeed().'<br>';
        
        if($aluno->update()){
                echo 'status atualizado<br>';
                echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
            }
            else{
                echo 'Falha em Atualizar<br>';
                echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
            }
}
    
    
    
    
    
}
PerfilComponent::run();











//$escola = new Escola();
//$codigo = 1234;
//if(count($escola->select("and codigo='".$codigo."'")) > 0){
//    echo 'pode passar';
//    
//}else {
//    echo 'não pode passar';
//}