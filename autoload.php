<?php

function __autoload($class){
    $cl = WWW_ROOT. DS . str_replace('\\', DS, $class). '.class'.'.php';
   // echo $cl;
    if(!file_exists($cl)){
         throw new Exception("File path '{$cl}' not found.");
    }else{
        require_once ($cl);
    }
    
}

