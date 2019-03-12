<!DOCTYPE html>
<?php
    include("menu.php");
    include("ContaCorrente.php");
    session_start();
?>

<html lang = "pt-br">

    <head>
        <title>Sacar</title>
        <meta charset = "utf-8" />
    </head>

    <body>
        <h1>Saque:</h1>
    
        <?php
            if(empty($_POST))
            {
                $id = $_GET["id"];
                $cc = $_SESSION["cc"][$id];
                
        ?>
    
            <form method = "post" action = "sacar.php">

            
                Correntista:<?php echo $cc->get_nome();?>
                (<?php echo $cc-> get_nro();?>)
                <br />
                Saldo: <?php echo $cc->get_saldo();?>
                <input type = "number" name = "valor" />
                <input type = "hidden" name = "id" value = "<?php echo $id;?>" />
                <button>SACAR</button>


            </form>   
        
        <?php
            }else
            {
                $id = $_POST["id"];
                $valor = $_POST["valor"];

                if($_SESSION["cc"][$id]->verificacao_saque($valor))
                {
                    $_SESSION["cc"][$id]->sacar($valor);
                    header("location: listar_cc.php");      
                    
                }
                else
                {
                    echo"Valor de saque + taxas é maior que o saldo atual";
                    echo"<a href = 'listar_cc.php'>Voltar para contas</a>";
                }    
            }
        ?>
    

        

    </body>


</html>