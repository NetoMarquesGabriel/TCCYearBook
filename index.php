<?php

define('WWW_ROOT',  dirname(__FILE__));
define('DS',DIRECTORY_SEPARATOR);
use Components\Module_restrito\HomeRestritoComponent;
use Components\Module_restrito\PerfilComponent;
use Components\Module_restrito\PerfilEscolaComponent;
use Components\Module_restrito\PerfilTurmaComponent;
use Components\Module_restrito\PerfilEComponent;
use Components\Module_restrito\PerfilEEscolaComponent;
use Components\Module_restrito\PerfilTurmaEComponent;
use Components\Module_restrito\QuemSomosComponent;
use Components\Module_restrito\ConfigComponent;
use Components\Module_restrito\ContatoComponent;
use Components\Module_comum\CadastroInstituicaoComponent;
use Components\Module_comum\CalcularPlanosComponent;
use Components\Module_comum\PayPalComponent;
use Components\Module_comum\ExibeCodComponent;
use Components\Module_comum\CadastroSalaComponent;
use Components\Module_comum\CadastroAlunoComponent;
use Components\HomeComponent;
use Components\LoginComponent;
use Components\Erro404Component;

require_once (WWW_ROOT.DS.'autoload.php');

class TApplication{
    static public function run(){
        
        $pastaTemplate = 'Templates';
        $content= '';
        $tpl = isset($_REQUEST['tpl'])?$_REQUEST['tpl']:'tpl-comum.html';
         $template = file_get_contents($pastaTemplate.'/'.$tpl); 
        if($_REQUEST){
           $component = isset($_REQUEST['component'])?$_REQUEST['component']:NULL;
           
            $method =   isset($_REQUEST['method'])?$_REQUEST['method']:NULL;
            $method2 =   isset($_REQUEST['method2'])?$_REQUEST['method2']:NULL;
            $falho = isset($_REQUEST['falho'])?$_REQUEST['falho']:NULL;
            //$module =    isset($_REQUEST['module'])?$_REQUEST['module']:NULL;
           
            if($method == NULL){
                    
                     $method='conteudoInicial';
                 }
                 if($falho != NULL){
                    
                     $component='LoginComponent';
                 }
                 $component2 = 'HomeComponent';
                
           ob_start();
if($component == 'PerfilComponent'){
                     $c = new PerfilComponent();   
                 }elseif($component == 'PerfilEscolaComponent'){
                     $c = new PerfilEscolaComponent();
                 }elseif($component == 'PerfilTurmaComponent'){
                     $c = new PerfilTurmaComponent();
                 }elseif($component == 'LoginComponent'){
                     $c = new LoginComponent();
                 }elseif($component == 'PerfilEComponent'){
                     $c = new PerfilEComponent();
                 }elseif($component == 'HomeRestritoComponent'){
                     $c = new HomeRestritoComponent();
                 }elseif($component == 'PerfilEEscolaComponent'){
                     $c = new PerfilEEscolaComponent();
                 }elseif($component == 'PerfilTurmaEComponent'){
                     $c = new PerfilTurmaEComponent();
                 }elseif($component == 'QuemSomosComponent'){
                     $c = new QuemSomosComponent();
                 }elseif($component == 'ContatoComponent'){
                     $c = new ContatoComponent();
                 }elseif($component == 'CadastroInstituicaoComponent'){
                     $c = new CadastroInstituicaoComponent();
                 }elseif($component == 'CalcularPlanosComponent'){
                     $c = new CalcularPlanosComponent();
                 }elseif($component == 'PayPalComponent'){
                     $c = new PayPalComponent();
                 }elseif($component == 'ExibeCodComponent'){
                     $c = new ExibeCodComponent();
                 }elseif($component == 'CadastroSalaComponent'){
                     $c = new CadastroSalaComponent();
                 }elseif($component == 'CadastroAlunoComponent'){
                     $c = new CadastroAlunoComponent();
                 }elseif($component == 'ConfigComponent'){
                     $c = new ConfigComponent();
                 }else{
                   $c =  new Erro404Component();
                 }    
                 $c->show($method);
                 $content = ob_get_contents();
           ob_end_clean();
           
            ob_start();
                
                if($component2 == 'HomeComponent'){
                  $c2 = new HomeComponent();  
                }
                $c2->show2($method2);
                $content2 = ob_get_contents();
                ob_end_clean();
                
                $paginaFinal =  str_replace('#COMPONENT_PRINCIPAL#',$content,$template);
                $paginaFinal2 = str_replace('#COMPONENT_SECUNDARIO#', $content2, $paginaFinal);
              echo $paginaFinal2;
              
              
//           $paginaFinal = str_replace('#COMPONENT_PRINCIPAL#', $content, $template);
//           echo $paginaFinal;
            
            
        }
        
        
        if(!$_GET and !$_POST){
                  //$template = file_get_contents($pastaTemplate.'/'.$tpl);
                  $module = 'Module_comum';
	          $component = 'LoginComponent';
                  $component2 = 'HomeComponent';
                 $method = isset($_REQUEST['method'])?$_REQUEST['method']:'conteudoInicial';
                 $method2 = isset($_REQUEST['method2'])?$_REQUEST['method2']:'conteudoInicial';
                    
		  ob_start();
                  //Aqui vai o conteúdo dinâmico
                 //  $c = new $component;
                  if($component  == 'LoginComponent'){
                  $c = new LoginComponent();
                  }
                  $c->show($method);
		  
                  //include_once "{$dir}/{$pagina}.php";
                  //show($acao); 
		  $content = ob_get_contents();
    	           ob_end_clean();
                  
                  // Area de propaganda 
                   ob_start();                  
                   if($component2 == 'HomeComponent'){
                      $c2 = new HomeComponent();   
                 }
                 
                 $c2->show2($method2);
                 $content2 = ob_get_contents();
                 ob_end_clean();   
                
               $paginaFinal =  str_replace('#COMPONENT_PRINCIPAL#',$content,$template);
               $paginaFinal2 = str_replace('#COMPONENT_SECUNDARIO#', $content2, $paginaFinal);
               echo $paginaFinal2;         
  
}
//        if(!$_GET and !$_POST){
//            $template = file_get_contents($tpl);
//            $component = 'HomeComponent';
//            $method = isset($_REQUEST['method'])?$_REQUEST['method']:'conteudoInicial';
//            ob_start();
//                if($component == 'HomeComponent'){
//                    $c = new HomeComponent();
//                 }
//                 $c->show($method);
//                 $content = ob_get_contents();
//            ob_end_clean();
//            
//            ob_start();
//                if($component == 'HomeComponent'){
//                    $c = new HomeComponent();
//                 }
//                 $c->show($method);
//                 $content = ob_get_contents();
//            ob_end_clean();
//           $paginaFinal = str_replace('#COMPONENT_PRINCIPAL#', $content, $template);
//           echo $paginaFinal;
//        }
        
    }
}
TApplication::run();