<?php 
    include("Veiculo_Processar.php");

    obterCampos();
    
    if($operacao == "INSERIR"){
        inserir();
    }

    $veiculos = selecionarTudo();
  

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Inserir Veiculo na loja</title>
        <link href="css/veiculo.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <hr>
        <h1 class="tabTitulo">Inserir veiculo</h1>
        <hr>

            <form action="" method="POST" class="formVeiculos">       
                <p>Modelo <input type="text" name="txtModelo" class="posCampos" 
                                            size="100" maxlength ="100"   
                                            value=" " /><br>
                <?php 
                    if(!empty($_SESSION['modeloVazio'])){
                        echo "<span class='msgValCampo'>" . $_SESSION['modeloVazio'] . "</span>";
                    }
                ?>
                    
                </p>
                            
                <p> 
                    Preço <b>R$</b><input type="number" name="txtPreco" class="posCampos"  
                                            min="0" step="500" 
                                            value=" " /><br>
                <?php 
                    if(!empty($_SESSION['precoVazio'])){
                        echo "<span class='msgValCampo'>" . $_SESSION['precoVazio'] . "</span>";
                    }
                ?>
                </p>            
                <p> 
                    Descrição <input type="text" name="txtDescricao" class="posCampos" 
                                            size="100"  
                                            value=" " />
                </p>
                <p> 
                    Placa <input type="text" name="txtPlaca" class="posCampos" 
                                            size="100"  
                                            value=" " />
                </p>     
                <p> 
                    Ano <input type="text" name="txtAno" class="posCampos" 
                                            size="10"  
                                            value=" " />
                </p>     
                <p> 
                    Blindado
                    <select name="selectBlindado" class="posCampos">
                        <option value="Sim">Sim</option>
                        <option value="Nao" selected>Nao</option>
                    </select>
                </p>                 
                <div class="centralizar">
                    <p>
                        <input class="BUTTON_VDR" type="submit" name="btnOperacao" value="Inserir" /> &nbsp; &nbsp;     
                    </p>           
                </div>         
            </form>
        </div>

        <table class="tabGeral">    
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Modelo</th>                
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Placa</th>
                    <th>Blindado</th>
                    <th>Ano</th>
                    <th class="tdCentro">Alterar</th>
                    <th class="tdCentro">Excluir</th>
                </tr>
            </thead>
            <tbody>
                    <?php 
                        foreach($veiculos as $veic){
                            $idVeiculo = $veic['idveiculo'];
                            $modelo = $veic['modelo'];
                            $descricao = $veic['descricao'];
                            $preco = $veic['preco'];
                            $placa = $veic['placa'];
                            $blindado = $veic['blindado'];
                            $ano = $veic['ano'];

                            echo "<tr>";
                                echo "<td>$idVeiculo</td>";
                                echo "<td>$modelo</td>";
                                echo "<td>$descricao</td>";
                                echo "<td>$preco</td>";
                                echo "<td>$placa</td>";
                                echo "<td>$blindado</td>";
                                echo "<td>$ano</td>";
                                echo "<td><a href='Veiculo_Atualizar.php?txtIdVeiculo=$idVeiculo'><img src='img/Editar.png' width='20px' height='20px' /> </a></td>";
                                echo "<td><a href='Veiculo_Excluir.php?txtIdVeiculo=$idVeiculo'><img src='img/Excluir.png'width='20px' height='20px' /> </a></td>";
                            echo "</tr>";
                        }
                    ?>
            </tbody>
        </table>
    </body>
</html>