<?php

namespace Components\Module_restrito;


        use Core\Escola;
        use Core\Midia;
        use Core\Usuario;
        use Core\Funcionario;
        use Core\Turma;
class PerfilEEscolaComponent {
    
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
            case 'editarTexto':
                $this->editarTexto();        

                break;
            case 'editarNome':
                $this->editarNome();        

                break;
            case 'adicionarFuncionario':
                $this->adicionarFuncionario();        

                break;
                case 'apagar':
                $this->apagar();        

                break;
            case 'apagarTurma':
                $this->apagarTurma();        

                break;
            case 'ativarTurma':
                $this->ativarTurma();        

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
                $funcionario = new Funcionario();
                $escola = new Escola();
                $array7 = $escola->select("and cod_usuario='".$_SESSION['cod_usuario']."'");
                $codEscola = $array7[0]['cod_escola'];
               echo'<div id="ver"> 
                <ul>
                    <li id="PT2">
                        <button onclick="funcao34()">
                            <a id="H_a12" href="#EN2">
                               <img src="images/brasil.png" alt="Bandeira do Brasil">
                            </a>
                        </button>
                    </li>
                    <li id="EN2">
                        <button onclick="funcao33()">
                            <a id="H_a" href="#PT2">
                                <img src="images/eua.png" alt="Bandeira Estados Unidos">
                            </a>
                        </button>
                    </li>
   <li><a id="i_a_ee" href="javascript:document.location=';echo"'";echo'?component=PerfilEscolaComponent&method=conteudoInicial&cod-escola='.$codEscola.'&tpl=escola-comum.html';echo"'";echo'">Ver Perfil Publico </a></li>
                    <li><a id="i_li6_hr" href="config.html">Configurações</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=QuemSomosComponent&method=conteudoInicial&tpl=quem_somos.html';echo"'";echo'">Quem somos</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=ContatoComponent&method=conteudoInicial&tpl=contato.html';echo"'";echo'">Contato</a></li>
                    <li><a href="javascript:document.location=';echo"'";echo'?component=LoginComponent&method=logout';echo"'";echo'">Sair</a></li>
                </ul>
               </div>  
            </nav>
            <div id="LY">
                <a href="home_restrita.html">
                    <img src="images/Logo.png" alt="Logo Yeahbook">
                </a>
            </div>
        </header>
        <hr class="hr_HR">
        

<div id="bg_escola">
            
                <form  method="post" > 
                <div id="auxi">
                     <input type="hidden" name="component" value="PerfilEEscolaComponent" />
                     
                     <input type="hidden" name="method" value="editarNome" />
                      
                <input id="i_inp_ee" type="text" placeholder="'.$_SESSION['nome_escola'].'" name="nome" required autofocus> 
                    </div>
                <button  id="i_but_ee" type="submit" name="btn_login" >Salvar</button>
                
            </form>
            </div>
            
            <div id="escola_E">
                <form method="post">
                <input type="hidden" name="component" value="PerfilEEscolaComponent" />
                     <input type="hidden" name="method" value="editarTexto" />
                <input id="i_inp2_ee" type="text" name="texto" placeholder="comente sobre sua escola"/>
                
                <button type="submit" name="btn_login" id="i_but_ee">Salvar</button>
                </div>
                    </form>
            
            

            <a id="i_a_ee" href="javascript:document.location=';echo"'";echo'?component=PerfilEscolaComponent&method=conteudoInicial&cod-escola='.$codEscola.'&tpl=escola-comum.html';echo"'";echo'">ver Perfil Publico </a>
        </div>
        <div id="bg_cargos">
        <h1 id="i_h1_ee" >Funcionários</h1>
        <div class="cargos"><ul>';
                
                
                
                $array7 = $funcionario->select("and cod_escola ='".$codEscola."'");
                $contadorFuncionario = count($array7);
                if($contadorFuncionario > 0){
                    for($i = 0;$i < $contadorFuncionario; $i++){
                    $funcionarioCod = $array7[$i]['cod_funcionario'];
                    $funcionarioNome = $array7[$i]['nome'];
                    $funcionarioCargo = $array7[$i]['cargo'];
                    $funcionarioMidia = $array7[$i]['url'];
                    //echo $funcionarioMidia;
                    echo'  
                                <li><div class="cargos">
                                <img src="'.$funcionarioMidia.'" alt="não sei">
                                  <ul>
                                  <li>Nome - '.$funcionarioNome.'</li>
                                  <li>Cargo - '.$funcionarioCargo.'</li><br>
                                  <a id="i_but4_ee" href="javascript:document.location=';echo"'";echo'?component=PerfilEEscolaComponent&method=apagar&tpl=perfil_escola_E.html&cod-funcionario='.$funcionarioCod;echo"'";echo'">Apagar </a>
                                  </ul>
                                  </div></li>
                                    ';  
                }}else{
                $funcionarioNome = 'não há funcionarios';
                echo'  <li><div id="bg_cargos">
                                <div class="cargos">

                                  <ul>
                                  <li>'.$funcionarioNome.'</li>
                                  </ul>  
                                  </div></li>
                                 
                  '; }
                       echo '
            <li><form method="post" enctype="multipart/form-data">
            <h2 style="text-align:center">Adicione um Funcionario</h2>
             <input type="hidden" name="component" value="PerfilEEscolaComponent" />
             <input type="hidden" name="method" value="adicionarFuncionario" />
              <label>Nome do Funcionario: </label><input id="i_inp3_ee" type="text" placeholder="nome aqui" name="nome" required autofocus><br>
              <label>Qual Cargo ele ocupa: </label><input id="i_inp4_ee" type="text" placeholder="cargo aqui" name="cargo" required ><br>
              <label>Selecione uma imagem:</label><input class="img_func" type="file" name="fileToUpload" id="fileToUpload">
                
               <button type="submit" name="btn_login">Salvar</button>
</form></li>
</ul>
</div>
        </div>
        <div id="turmas_Esc">
            <h1 id="i_h12_ee">Turmas da Escola</h1>
            <ul class="ul" >
               '; 
                    $turma = new Turma();
                       
                 $listaTurmas = $turma->select("and cod_escola='".$codEscola."' and cod_status_turma='A'");
                $contadorTurmaEscola = count($listaTurmas);
                for($i = 0; $i < $contadorTurmaEscola; $i++){
                    $turmas = $listaTurmas[$i]['nome'];
                    $turmaCod = $listaTurmas[$i]['cod_turma'];
                   echo' <li>
                    <a class="turma" href="javascript:document.location=';echo"'";echo'?component=PerfilTurmaComponent&method=conteudoInicial&cod-turma='.$turmaCod.'&tpl=Turma-restrito.html';echo"'";echo'">
                        '.$turmas.'
                    </a>
                     <a style="color:red" href="javascript:document.location=';echo"'";echo'?component=PerfilEEscolaComponent&method=apagarTurma&cod-turma='.$turmaCod.'&tpl=escola-comum.html';echo"'";echo'" >
                        Apagar
                    </a>'        ;
                }
               
                echo'
            </ul>
        </div>
        <div id="turmas_Esc">
            <h1>Turmas apagadas</h1>
            <ul>
               '; 
                    $turma = new Turma();
                       
                 $listaTurmas = $turma->select("and cod_escola='".$codEscola."' and cod_status_turma='I'");
                $contadorTurmaEscola = count($listaTurmas);
                if($contadorTurmaEscola > 0 ){
                for($i = 0; $i < $contadorTurmaEscola; $i++){
                    $turmas = $listaTurmas[$i]['nome'];
                    $turmaCod = $listaTurmas[$i]['cod_turma'];
                   echo' <li>
                    <a class="turma" href="javascript:document.location=';echo"'";echo'?component=TurmaComponent&method=conteudoInicial&cod-turma='.$turmaCod.'&tpl=Turma-restrito.html';echo"'";echo'">
                        '.$turmas.'
                    </a>
                     <a style="color:red" href="javascript:document.location=';echo"'";echo'?component=PerfilEEscolaComponent&method=ativarTurma&cod-turma='.$turmaCod.'&tpl=escola-comum.html';echo"'";echo'" ><br>
                        Ativar
                    </a>'        ;
                }}
                else {
                    echo '<h2 >Não há turmas inativas</h2>';
                }
               
                echo'
            </ul>
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
    
    public function editarTexto() {
        try {
            $escola = new Escola();
            $array = $escola->select("and cod_usuario='".$_SESSION['cod_usuario']."'");
            $escola->setCodEscola($array[0]['cod_escola']);
            $escola->setCodRegistro($array[0]['cod_registro']);
            $escola->setCodStatusEscola('A');
            $escola->setCodUsuario($array[0]['cod_usuario']);
            $escola->setTexto($_REQUEST['texto']);
            if($escola->update()){
                echo 'Texto Atualizado, Relogue novamente para ver as atualizações<br>';
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
        
        public function editarNome() {
            try {
               $usuario = new Usuario(); 
               $array = $usuario->select("and cod_usuario='".$_SESSION['cod_usuario']."'");
               $usuario->setEmailUsuario($array[0]['email_usuario']);
               $usuario->setSenhaUsuario($array[0]['senha_usuario']);
               $usuario->setCodStatusUsuario($array[0]['cod_status_usuario']);
               $usuario->setNomeUsuario($_REQUEST['nome']);
               $usuario->setCodUsuario($_SESSION['cod_usuario']);
               if($usuario->update()){
                echo 'Nome Atualizado, Relogue novamente para ver as atualizações<br>';
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
                
                public function apagar() {
                    $funcionario = new Funcionario();
                    
                    $funcionario->setCodFuncionario($_GET['cod-funcionario']);
                    if($funcionario->delete()){
                echo 'Funcionario Deletado,Relogue para atualizar as informações<br>';
                echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
            }
            else{
                echo 'Falha em deletar<br>';
                echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
            }
                }
                
                public function apagarTurma() {
                    $codTurma = $_GET['cod-turma'];
                    $turma = new Turma();
                    $turma->setCodStatusTurma('I');
                    $turma->setCodTurma($codTurma);
                    if($turma->DeleteLogic()){
                echo 'Turma Deletada<br>';
                echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
            }
            else{
                echo 'Falha em deletar<br>';
                echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
            }
                }
                public function ativarTurma() {
                    $codTurma = $_GET['cod-turma'];
                    $turma = new Turma();
                    $turma->setCodStatusTurma('A');
                    $turma->setCodTurma($codTurma);
                    if($turma->DeleteLogic()){
                echo 'Turma ativada<br>';
                echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
            }
            else{
                echo 'Falha em deletar<br>';
                echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
            }
                }

                
                public function adicionarFuncionario() {
                    try {
                       $escola = new Escola();
                       $array = $escola->select("and cod_usuario='".$_SESSION['cod_usuario']."'");
                     $CodEscola = ($array[0]['cod_escola']);
                     $funcionario = new Funcionario();
                     $funcionario->setCodStatusFuncionario("A");
                     $funcionario->setCargo($_REQUEST['cargo']);
                     $funcionario->setNomeFuncionario($_REQUEST['nome']);
                     $funcionario->setCodEscola($CodEscola);
                     
                     
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
                               $funcionario->setUrl($target_file);
                            } else {
                                echo "Sorry, ouve um erro";
    }
}
                     
                     
                     if($funcionario->insert()){
                echo 'Funcionario Cadastrado, Relogue novamente para ver as atualizações<br>';
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
                
        
        
        
//   
    
    
 
}
PerfilEscolaComponent::run();

//$turma = $json[0]['turma'];
               
//               $json = $aluno->select ("and turma=". $turma);
//               $contador = count($json);
//               for($i = 0;$i > $contador;$i++){
//                   $aluno.$i = $json[$i]['cod_usuario'];
//                   $json2 = $usuario->select("and cod_usuario=". $aluno.$i);
//                   $alunoNome.$i = $json2[$i]['nome_usuario'];
//               }