<!DOCTYPE html>
<?php
    include("menu.php");
    include("ContaCorrente.php");
    session_start();
?>

<html lang = "pt-br">

    <head>
        <title>Depositar</title>
        <meta charset = "utf-8" />
    </head>

    <body>
        <h1>Deposito:</h1>
    
        <?php
            if(empty($_POST))
            {
                $id = $_GET["id"];
                $cc = $_SESSION["cc"][$id];
                
        ?>
    
            <form method = "post" action = "depositar.php">

            
                Correntista:<?php echo $cc->get_nome();?>
                (<?php echo $cc-> get_nro();?>)
                <br />
                Saldo: <?php echo $cc->get_saldo();?>
                <input type = "number" name = "valor" />
                <input type = "hidden" name = "id" value = "<?php echo $id;?>" />
                <button>Depositar</button>


            </form>   
        
        <?php
            }else
            {
                $id = $_POST["id"];
                $valor = $_POST["valor"];
                $_SESSION["cc"][$id]->depositar($valor);
                header("location: listar_cc.php");        
            }
        ?>
    
    </body>


</html>