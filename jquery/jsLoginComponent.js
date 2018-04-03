
$(document).ready(function(){
   $("#btn_login").click(function(){
        validaLogin( $("#login"),$("#senha")); 
        //alert("teste");
   }); 
});

function validaLogin(login, senha){
    if(login.val() == ""){
        alert("Informe o Login!");
        login.focus();
        return;
    }else if(senha.val() == ""){
        alert("Informe a Senha!")
        senha.focus();
        return;
    }else{
        $("#resultado").html("Autenticando...");
        //$("#resultado").html("<img src='imagem/load.gif'>");
        $.post("Components/LoginComponent.class.php?acaoAjax=autenticar",{login:login.val(), senha: senha.val()},
                function (retorno){
                    $("#resultado").html(retorno);
                }
                );
    }  
}