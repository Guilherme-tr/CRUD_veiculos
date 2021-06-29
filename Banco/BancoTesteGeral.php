<?php 
    date_default_timezone_set('America/Sao_Paulo');
    $servidor = 'localhost';
    $banco = 'escola_curso';
    $usuario = 'root';
    $senha = 'admin';

    $con = null;
    $sql = "";
    $operacao = "";

    $operacao = "SELECIONAR";

    try{
        $con = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8",$usuario,$senha);
        echo "Conectado";
    }catch(PDOException $ex){
        echo "Erro: ". $ex->getMessage() . "<br>";
        die();
    }

    try{
        if($operacao == "INSERIR"){
            $modelo = "Corsa";
            $descricao = "sem destalhes";
            $preco = 12000.00;
            $data_criacao = date('Y-m-d H:i:s');

            $cmdSQL = $con->prepare("INSERT INTO veiculos(modelo,descricao,preco,data_criacao) VALUES (:modelo, :descricao, :preco, :data_criacao)");
            $cmdSQL->bindParam(":modelo", $modelo);
            $cmdSQL->bindParam(":descricao", $descricao);
            $cmdSQL->bindParam(":preco", $preco);
            $cmdSQL->bindParam(":data_criacao", $data_criacao);

            if($cmdSQL->execute()){
                echo "Insercao de veiculo efetuada";
                echo "linhas afetadas: ". $cmdSQL->rowCount() . "<br>";
            }
            else{
                echo "Falha na insercao";
                var_dump($cmdSQL->errorInfo());
                die();
            }

        }
    }catch(PDOException $ex){
        echo "Erro: ". $ex->getMessage() . "<br>";
        die();
    }

    try{
        if($operacao == "SELECIONAR"){
            
            $cmdSQL = $con->prepare("SELECT * FROM veiculos");


            if($cmdSQL->execute()){
                $veiculos = $cmdSQL->fetchAll();
                foreach($veiculos as $veic){
                    echo "Id Veiculo: " . $veic['idveiculo'] . "<br>";
                    echo "Modelo: " . $veic['modelo'] . "<br>";
                    echo "Descrição: " . $veic['descricao'] . "<br>";
                    echo "Preço: " . $veic['preco'] . "<br>";
                    echo "Data de criação: " . $veic['data_criacao'] . "<br>";
                }
            }
            else{
                echo "Falha na insercao";
                var_dump($cmdSQL->errorInfo());
                die();
            }

        }
    }catch(PDOException $ex){
        echo "Erro: ". $ex->getMessage() . "<br>";
        die();
    }


    try{
        if($operacao == "ALTERAR"){

            $idveiculo = 1;

            $modelo = "HB20";
            $descricao = "sem destalhes";
            $preco = 34000.00;
            $data_criacao = date('Y-m-d H:i:s');
            
            $cmdSQL = $con->prepare("UPDATE veiculos SET modelo = :modelo, descricao = :descricao, preco = :preco, data_criacao = :data_criacao WHERE idveiculo = :idveiculo");

            $cmdSQL->bindParam(":idveiculo", $idveiculo);
            $cmdSQL->bindParam(":modelo", $modelo);
            $cmdSQL->bindParam(":descricao", $descricao);
            $cmdSQL->bindParam(":preco", $preco);
            $cmdSQL->bindParam(":data_criacao", $data_criacao);

            if($cmdSQL->execute()){
                echo "Alteração bem sucedida";
            }
            else{
                echo "Falha na alteração";
                var_dump($cmdSQL->errorInfo());
                die();
            }
        }
    }catch(PDOException $ex){
        echo "Erro: ". $ex->getMessage() . "<br>";
        die();
    }
?>