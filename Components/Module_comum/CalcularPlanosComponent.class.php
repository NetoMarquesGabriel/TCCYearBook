<?php
namespace Components\Module_comum;

if(!session_start()){
            session_start();
            
        }
class CalcularPlanosComponent {
    
    //Lógica para trabalhar com Ajax
    
    static public function run(){
     
        if($_REQUEST){
            $method = isset ($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $calcularPlanosComponent = new CalcularPlanosComponent();
            $calcularPlanosComponent->show($method);
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
                if($_SESSION['tipo_cadastro'] == 'E'){
                  echo '<script>
$(document).ready(function(){
        var valor = $("#text");
    $("#plano_mensal").click(function(){
        $(".texto").text(" R$ 45,00!");
    });
    $("#plano_mensal1").click(function(){
        $(".texto").text(" R$ 50,00!");
    });
    $("#plano_mensal2").click(function(){
        $(".texto").text(" R$ 65,00!");
    });
    $("#plano_mensal3").click(function(){
        $(".texto").text(" R$ 70,00!");
       
    });
    $("#plano_mensal4").click(function(){
        $(".texto").text(" R$ 130,00!");
       
    });
});
</script>
    </head>
    <body>
        <header id="teste">
            <div id="alterar">
                    <ul>             
                        <li id="PT">
                            <button onclick="funcao20()">
                                <a id="H_a1" href="#EN">
                                    <img src="images/brasil.png" alt="Bandeira do Brasil">
                                </a>
                            </button>
                        </li>
                        <li id="EN">
                            <button onclick="funcao19()">
                                <a id="H_a" href="#PT">
                                    <img src="images/eua.png" alt="Bandeira Estados Unidos">
                                </a>
                            </button>
                        </li>
                    </ul>
                </div>
            <a href="index.html">
                <img src="images/Logo.png" alt="Logo Yeahbook">
            </a>
        </header>
        <hr class="hr_cad">
        <!-- Header desktop -->
        <header id="pum">
            <a href="index.html"><img src="images/Logo.png" alt="Logo Yeahbook"></a>
        </header>
        <hr id="xau">
        <div id="body">
            <div id="calculo_classe">
                <div id="calc">
                    <h1 id="i_h1_calc" >Cálculo do plano escolar mensal</h1>
                    <h2 id="i_h2_calc" >Primeiramente, escolha quantos alunos a sua escola possui</h2>
                    <form>
                        <ul>
                            <li><input type="radio" name="plano" id="plano_mensal"  > <span>01 - 100</span> </li>
                            <li><input type="radio" name="plano" id="plano_mensal1" > 101 - 200 </li>
                            <li><input type="radio" name="plano" id="plano_mensal2" > 201 - 500 </li>
                            <li><input type="radio" name="plano" id="plano_mensal3" > <span class=span22>501 - 1000</span> </li>
                            <li><input type="radio" name="plano" id="plano_mensal4" > <span class="span23"> 1000 + </span> </li>
                        </ul>
                        <h1 class=texto></h1>            
                    </form>
                    <a id="i_a_calc" href="javascript:document.location=';echo"'";echo'?component=PayPalComponent&method=conteudoInicial&tpl=paypal.html';echo"'";echo'">Ir ao pagamento
                    </a>
                </div>
            </div>
        </div>';  
                } else {
                    
                    echo'<script>
        $(document).ready(function(){
                var valor = $("#text");
            $("#plano_mensal").click(function(){
                $(".texto").text(" R$ 30,00 mensais!");
            });
            $("#plano_anual").click(function(){
                $(".texto").text(" R$ 320,00 anuais!");
            });
        });
        </script>
    </head>
    <body>
        <header id="teste">
            <div id="alterar">
                <ul>             
                    <li id="PT">
                        <button onclick="funcao26()">
                            <a id="H_a1" href="#EN">
                                <img src="images/brasil.png" alt="Bandeira do Brasil">
                            </a>
                        </button>
                    </li>
                    <li id="EN">
                        <button onclick="funcao25()">
                        <a id="H_a" href="#PT">
                                <img src="images/eua.png" alt="Bandeira Estados Unidos">
                            </a>
                        </button>
                    </li>
                </ul>
            </div>
            <a href="index.html">
                <img src="images/Logo.png" alt="Logo Yeahbook">
            </a>
        </header>
        <hr class="hr_cad">
        <div id="calculo_classe">
            <div id="calc2">
                <h1 id="i_h1_calc2" >Escolha o tipo de plano:</h1>
                <form>
                        <ul>
                            <li id="i_li_calc2" ><input type="radio" name="plano_T" id="plano_mensal"> Mensal </li>
                            <li id="i_li2_calc2" ><input type="radio" name="plano_T" id="plano_anual"> Anual </li>
                        </ul>
                        <h1 class=texto></h1>         
                    </form>
                <a id="i_a_calc2" class="envio2" href="cadastro_pessoa.html">Cadastre-se como aluno</a>
            </div>
        </div>';
                }
                
            } catch (Exception $exc){
                echo $exc -> getTraceAsString();
            } finally {
                
            }
    }
}
CalcularPlanosComponent::run();