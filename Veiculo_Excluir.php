
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Excluir Veiculo</title>
        <link href="css/veiculo.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <hr> <h1 class="tabTitulo">Excluir Veiculo</h1>   <hr>
        <form action="" method="POST">  <br>
        <p> 
            ID <input type="number" name="txtIdVeiculo" readonly class="posCampos"                                                                        
                                    value=" " />
            </p>

            <p>           
            Modelo <input type="text" name="txtModelo" readonly class="posCampos" 
                                    size="100" maxlength ="100"   
                                    value=" " />
            </p>            
            <p> 
            Preço <input type="number" name="txtPreco" readonly class="posCampos"  
                                    min="0" max="10" step=".5" 
                                    value=" " />
            </p>            
            <p> 
            Descrição <input type="text" name="txtDescricao" readonly class="posCampos" 
                                    size="100"  
                                    value=" "/>
            </p>            
            <div class="centralizar">   
                <p>                              
                    <input type="submit" name="btnOperacao" value="Excluir"  /> 
                    &nbsp; &nbsp;
                    <input type="submit" name="btnOperacao" value="Cancelar" /> 
                    &nbsp; &nbsp;
                </p>
            </div>  
        </form>    
        <h3 class="msgExcluir">Deseja realmente excluir os dados?</h3>     
    </body>
</html>

