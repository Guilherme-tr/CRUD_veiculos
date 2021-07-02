<?php 

    date_default_timezone_set('America/Sao_Paulo');

    $operacao = null;
    $modelo = null;
    $descricao = null;
    $preco = null;
    $data_criacao = null;
    $placa = null;
    $ano = null;
    $blindado = null;

    echo "Processar";

    function obterCampos(){
        try{
            global $operacao;
            global $modelo;
            global $descricao;
            global $preco;
            global $data_criacao;
            global $placa;
            global $ano;
            global $blindado;

            if(isset($_REQUEST["btnOperacao"])){
                $operacao = $_REQUEST["btnOperacao"];
                $operacao = strtoupper($operacao);
            }else{
                $operacao = "VAZIO";
            }

            // ID VEICULO
            if(isset($_REQUEST["txtIdVeiculo"])){
                if(!empty($_REQUEST["txtIdVeiculo"])){
                    $idVeiculo = $_REQUEST["txtIdVeiculo"];
                }
            }

            // MODELO VEICULO
            if(isset($_REQUEST["txtModelo"])){
                if(!empty($_REQUEST["txtModelo"])){
                    $modelo = $_REQUEST["txtModelo"];
                    $_SESSION["modelo"] = $modelo;
                }
            }

            // DESCRICAO VEICULO
            if(isset($_REQUEST["txtDescricao"])){
                if(!empty($_REQUEST["txtDescricao"])){
                    $descricao = $_REQUEST["txtDescricao"];
                    $_SESSION["descricao"] = $descricao;
                }
            }

            // PRECO VEICULO
            if(isset($_REQUEST["txtPreco"])){
                if(!empty($_REQUEST["txtPreco"])){
                    $preco = $_REQUEST["txtPreco"];
                    $_SESSION["preco"] = $preco;
                }
            }

            // PLACA VEICULO
            if(isset($_REQUEST["txtPlaca"])){
                if(!empty($_REQUEST["txtPlaca"])){
                    $placa = $_REQUEST["txtPlaca"];
                    $_SESSION["placa"] = $placa;
                }
            }

            // ANO VEICULO
            if(isset($_REQUEST["txtAno"])){
                if(!empty($_REQUEST["txtAno"])){
                    $ano = $_REQUEST["txtAno"];
                    $_SESSION["ano"] = $ano;
                }
            }

            // BLINDAGEM VEICULO
            if(isset($_REQUEST["selectBlindado"])){
                if(!empty($_REQUEST["selectBlindado"])){
                    $blindado = $_REQUEST["selectBlindado"];
                    $_SESSION["blindado"] = $blindado;
                }
            }

            echo "Operacção: $operacao <br>";
            echo "Modelo: $modelo <br>";
            echo "Descrição: $descricao <br>";
            echo "Preço: $preco <br>";
            echo "Placa: $placa <br>";
            echo "Ano: $ano <br>";
            echo "Blindado: $blindado <br>";

        }catch(Error $ex){
            echo "<h2 style='color: red;'> Erro: " . $ex->getMessage() . "</h2>";
            echo "<p><a href='Veiculo_Principal.php'>Clique aqui para voltar</a></p>";
            die();
        }

        
    }

    function validaCampos(){
        try{
            global $modelo;

            $validar = 1;

            if(empty($modelo)){
                $_SESSION["modeloVazio"] = "Por favor, coloque o nome do modelo";
                $validar = 0;
            }
            return $validar;
        }catch(Error $ex){
            echo "<h2 style='color: red;'> Erro: " . $ex->getMessage() . "</h2>";
            echo "<p><a href='Veiculo_Principal.php'>Clique aqui para voltar</a></p>";
            die();
        }
        
    }

?>