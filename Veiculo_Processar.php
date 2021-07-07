<?php 

    date_default_timezone_set('America/Sao_Paulo');

    if(session_start() != PHP_SESSION_ACTIVE){
        session_start();
    }

    limparSessao();

    $operacao = null;
    $modelo = null;
    $descricao = null;
    $preco = null;
    $data_criacao = null;
    $placa = null;
    $ano = null;
    $blindado = null;


    function obterCampos(){
        try{
            global $idVeiculo;
            global $operacao;
            global $modelo;
            global $descricao;
            global $preco;
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
            /*
            echo "Operacção: $operacao <br>";
            echo "Modelo: $modelo <br>";
            echo "Descrição: $descricao <br>";
            echo "Preço: $preco <br>";
            echo "Placa: $placa <br>";
            echo "Ano: $ano <br>";
            echo "Blindado: $blindado <br>";
            */

        }catch(Error $ex){
            echo "<h2 style='color: red;'> Erro: " . $ex->getMessage() . "</h2>";
            echo "<p><a href='Veiculo_Principal.php'>Clique aqui para voltar</a></p>";
            die();
        }

        
    }

    function validaCampos(){
        try{
            global $modelo;
            global $preco;

            $validar = 1;

            if(empty($modelo)){
                $_SESSION["modeloVazio"] = "Por favor, coloque o nome do modelo";
                $validar = 0;
            }
            if(empty($preco)){
                $_SESSION["precoVazio"] = "Por favor, coloque o preço do modelo";
                $validar = 0;
            }

            return $validar;
        }catch(Error $ex){
            echo "<h2 style='color: red;'> Erro: " . $ex->getMessage() . "</h2>";
            echo "<p><a href='Veiculo_Principal.php'>Clique aqui para voltar</a></p>";
            die();
        }
        
    }

    function limparSessao(){
        try{
            unset($_SESSION['modelo']);
            unset($_SESSION['descricao']);
            unset($_SESSION['preco']);
            unset($_SESSION['modeloVazio']);
            unset($_SESSION['precoVazio']);

        }catch(Error $ex){
            echo "<h2 style='color: red;'>Erro: " . $ex->getMessage() . "</h2>";
            echo "<p><a href='Veiculo_Principal.php'>Clique aqui para voltar</a></p>";
            die();
        }
    }


    function abrirConexao(){
        $servidor = 'localhost';
        $banco = 'escola_curso';
        $usuario = 'root';
        $senha = 'admin';
        $con = null;

        try{
            $con = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8", $usuario, $senha);
            return $con;
        }catch(Error $ex){
            echo "<h2 style='color: red;'>Erro: " . $ex->getMessage() . "</h2>";
            echo "<p><a href='Veiculo_Principal.php'>Clique aqui para voltar</a></p>";
            die();
        }
    }

    function inserir(){
        try{
            global $modelo;
            global $descricao;
            global $preco;
            global $data_criacao;
            global $placa;
            global $ano;
            global $blindado;

            $data_criacao = date('Y-m-d H:i:s');

            
            if(!validaCampos()){
                return;
            }

            $con = abrirConexao();

            $cmdSQL = $con->prepare("INSERT INTO veiculos(modelo,descricao,preco,data_criacao,placa,ano,blindado) VALUES (:modelo, :descricao, :preco, :data_criacao, :placa, :ano, :blindado)");
            $cmdSQL->bindParam(":modelo", $modelo);
            $cmdSQL->bindParam(":descricao", $descricao);
            $cmdSQL->bindParam(":preco", $preco);
            $cmdSQL->bindParam(":data_criacao", $data_criacao);
            $cmdSQL->bindParam(":placa", $placa);
            $cmdSQL->bindParam(":ano", $ano);
            $cmdSQL->bindParam(":blindado", $blindado);

            if($cmdSQL->execute()){
                limparSessao();
            }
            else{
                echo "Falha na insercao";
                var_dump($cmdSQL->errorInfo());
                echo "<p><a href='Veiculo_Principal.php'>Clique aqui para voltar</a></p>";
                die();
            }

            $con = null;

        }catch(Error $ex){
            echo "<h2 style='color: red;'>Erro: " . $ex->getMessage() . "</h2>";
            echo "<p><a href='Veiculo_Principal.php'>Clique aqui para voltar</a></p>";
            die();
        }
    }

    function selecionarTudo(){
        try{

        $con = abrirConexao();

        $cmdSQL = $con->prepare("SELECT * FROM veiculos");
        $cmdSQL->bindParam(":idveiculo", $idveiculo);


            if($cmdSQL->execute()){
                $veiculos = $cmdSQL->fetchAll();

                $con = null;

                if(count($veiculos)){
                    //print_r($veiculos);
                    return $veiculos;
                }
                else{
                    return [];
                }    
            }
            else{
                echo "Falha na seleção";
                var_dump($cmdSQL->errorInfo());
                die();
            }
            

        }catch(Error $ex){
            echo "<h2 style='color: red;'>Erro: " . $ex->getMessage() . "</h2>";
            echo "<p><a href='Veiculo_Principal.php'>Clique aqui para voltar</a></p>";
            die();
        }
    }

    function selecionarPorId(){
        try{

            global $idVeiculo;

            $con = abrirConexao();

            $cmdSQL = $con->prepare("SELECT * FROM veiculos WHERE idveiculo = :idVeiculo");
            $cmdSQL->bindParam(":idVeiculo", $idVeiculo);


            if($cmdSQL->execute()){
                $veiculos = $cmdSQL->fetchAll();

                $con = null;

                if(count($veiculos)){
                    //print_r($veiculos);
                    return $veiculos;
                }
                else{
                    return [];
                }    
            }
            else{
                echo "Falha na seleção";
                var_dump($cmdSQL->errorInfo());
                die();
            }
            

        }catch(Error $ex){
            echo "<h2 style='color: red;'>Erro: " . $ex->getMessage() . "</h2>";
            echo "<p><a href='Veiculo_Principal.php'>Clique aqui para voltar</a></p>";
            die();
        }
    }

    function atualizar(){
        global $idVeiculo;
        global $modelo;
        global $descricao;
        global $preco;
        global $data_criacao;
        global $placa;
        global $ano;
        global $blindado;
        $data_criacao = date('Y-m-d H:i:s');

            
            if(!validaCampos()){
                return;
            }

            $con = abrirConexao();

            $cmdSQL = $con->prepare("UPDATE veiculos SET modelo = :modelo, descricao = :descricao, preco = :preco, data_criacao = :data_criacao, placa = :placa, ano = :ano, blindado = :blindado WHERE idveiculo = :idVeiculo");

            $cmdSQL->bindParam(":idVeiculo", $idVeiculo);
            $cmdSQL->bindParam(":modelo", $modelo);
            $cmdSQL->bindParam(":descricao", $descricao);
            $cmdSQL->bindParam(":preco", $preco);
            $cmdSQL->bindParam(":data_criacao", $data_criacao);
            $cmdSQL->bindParam(":placa", $placa);
            $cmdSQL->bindParam(":ano", $ano);
            $cmdSQL->bindParam(":blindado", $blindado);

            if($cmdSQL->execute()){
                limparSessao();
                header("Location: Veiculo_Principal.php");
            }
            else{
                echo "Falha na insercao";
                var_dump($cmdSQL->errorInfo());
                echo "<p><a href='Veiculo_Principal.php'>Clique aqui para voltar</a></p>";
                die();
            }

            $con = null;
    }

?>