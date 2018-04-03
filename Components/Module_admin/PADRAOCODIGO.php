<?php

namespace Components\Module_comum;

class HomeComponent {
    
    //Lógica para trabalhar com Ajax
    
    static public function run(){
     
        if($_REQUEST){
            $method = isset ($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $homeComponent = new HomeComponent();
            $homeComponent->show($method);
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
            try {
                echo 'Conteudo Dinâmico!';
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }
    }
}
HomeComponent::run();



//public function editarPerfil() {
//        try {
//            $midia = new Midia();
//        $midia->setCodUsuario($_SESSION['cod_usuario']);
//        $midia->setCodStatusMidia('A');
//        $midia->setTipoMidia('P');
//        $midia->setCodMidia($_REQUEST['cod-midia']);
//        
//                        $target_dir = "Uploads/";
//                        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//                        $uploadOk = 1;
//                        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//                        // verifica se imagem é verdadeira 
//                        if(isset($_POST["submit"])) {
//                            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//                            if($check !== false) {
//        
//                                $uploadOk = 1;
//                            } else {
//                                echo "Arquivo não é uma imagem.<br/>";
//                                $uploadOk = 0;
//                            }
//                        }
//                        // verifica se imagem ja existe
//                        if (file_exists($target_file)) {
//                            echo "desculpe,arquivo já existe<br/>";
//                            $uploadOk = 0;
//                        }
//                        // verifica tamanho de imagem
//                        if ($_FILES["fileToUpload"]["size"] > 1000000) {
//                            echo "desculpe,arquivo é muito grande<br/>";
//                            $uploadOk = 0;
//                        }
//                        // verifica se são formatos permitidos
//                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//                        && $imageFileType != "gif" ) {
//                            echo "desculpe,somente JPG, JPEG, PNG & GIF são suportados<br/>";
//                            $uploadOk = 0;
//                        }
//                        // se uploadOk for 0 não faz o upload
//                        if ($uploadOk == 0) {
//                            echo "desculpe,arquivo não upado<br/>";
//                        // if everything is ok, try to upload file
//                        } else {
//                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//                               $midia->setUrl($target_file);
//                            } else {
//                                echo "Sorry, ouve um erro";
//                        }}
//    if($midia->update()){
//                echo 'foto cadastrada<br>';
//                echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
//            }
//            else{
//                echo 'Falha em Atualizar<br>';
//                echo '<button class="btn" value="Voltar" onClick="JavaScript: window.history.back();">voltar<br></button>';
//            }
//                        
//} catch (Exception $exc) {
//    echo $exc->getTraceAsString();
//}
//   
//}