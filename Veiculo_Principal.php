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
                <p>Modelo <input type="text" name="txtNome" class="posCampos" 
                                            size="100" maxlength ="100"   
                                            value=" " /><br>
                    
                </p>
                            
                <p> 
                    Preço <b>R$</b><input type="number" name="txtPreco" class="posCampos"  
                                            min="0" max="1.000.000" step="500" 
                                            value=" " /><br>
                    
                </p>            
                <p> 
                    Descrição <input type="text" name="txtDescricao" class="posCampos" 
                                            size="100"  
                                            value=" " />
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
                    <th>Preço</th>
                    <th class="tdCentro">Alterar</th>
                    <th class="tdCentro">Excluir</th>
                </tr>
            </thead>
            <tbody>
            
            </tbody>
        </table>
    </body>
</html>