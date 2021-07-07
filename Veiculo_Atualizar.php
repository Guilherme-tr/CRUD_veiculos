<?php 
    include("Veiculo_Processar.php");

    obterCampos();
    

    if($operacao == "ALTERAR"){
        atualizar();
    }
    elseif($operacao == "CANCELAR"){
        header("Location: Veiculo_Principal.php");
    }

    $veiculos = selecionarPorId();
  

?>



<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Alterar Produto</title>
        <link href="css/veiculo.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <hr><h1 class="tabTitulo">Alterar veiculo</h1><hr>
        <br>
        <form action="" method="POST">

            <p>           
            Modelo <input type="text" name="txtModelo" class="posCampos" 
                                    size="100" maxlength ="100"   
                                    value=" <?php echo $veiculos[0]['modelo']; ?>" />            
            </p>            
            <p> 
            Preço <input type="number" name="txtPreco" class="posCampos"  
                                    min="0"
                                    value=" <?php echo $veiculos[0]['preco']; ?>" />
            </p>            
            <p> 
            Descrição <input type="text" name="txtDescricao" class="posCampos" 
                                    size="100"  value=" <?php echo $veiculos[0]['descricao']; ?>" />
            </p> 
            <p> 
            Placa <input type="text" name="txtPlaca" readonly class="posCampos" 
                                    size="100"  value=" <?php echo $veiculos[0]['placa']; ?>" />
            </p>
            <p> 
            Ano <input type="text" name="txtAno" readonly class="posCampos" 
                                    size="100"  value=" <?php echo $veiculos[0]['ano']; ?>" />
            </p>
            <p> 
                Blindado
                    <select name="selectBlindado" class="posCampos">
                        <option value="Sim">Sim</option>
                        <option value="Nao" selected>Nao</option>
                    </select>
            </p>               
            <div class="centralizar">  
            <br> 
                <p>                              
                    <input class="BUTTON_RYA2" type="submit" name="btnOperacao" value="Alterar" /> 
                    &nbsp; &nbsp;
                    <input class="BUTTON_VDR" type="submit" name="btnOperacao" value="Cancelar" /> 
                    &nbsp; &nbsp;
                </p>
            </div>  
            <br>
        </form>         
    </body>
</html>

