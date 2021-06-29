
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Alterar Produto</title>
        <link href="css/veiculo.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <hr><h1 class="tabTitulo">Alterar veiculo</h1><hr>
        <form action="" method="POST">
            <p> 
            ID <input type="number" name="txtIdVeiculo" readonly class="posCampos"                                                                        
                                    value=" " />
            </p>

            <p>           
            Nome <input type="text" name="txtModelo" class="posCampos" 
                                    size="100" maxlength ="100"   
                                    value=" " />            
            </p>            
            <p> 
            Preço <input type="number" name="txtPreco" class="posCampos"  
                                    min="0" max="10" step=".5" 
                                    value=" " />
            </p>            
            <p> 
            Descrição <input type="text" name="txtDescricao" class="posCampos" 
                                    size="100"  value=" " />
            </p>            
            <div class="centralizar">   
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

