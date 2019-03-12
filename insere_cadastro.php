
<!DOCTYPE <!DOCTYPE html>

<html lang = "pt-br">

	<head>

		<meta charset="utf-8" />
		<title>Insere Cadastro</title>

	</head>

	<body>

		<a href="cadastro.php">Voltar para o cadastro</a>

			Ou

		<?php

			include("menu.php");
				
			session_start();

			include("ContaCorrente.php");
			include("ContaPoupanca.php");
			
			$nome = $_POST["cliente"];
			$nro = $_POST["nro"];
			$data = $_POST["data_abertura"];
			$saldo = $_POST["saldo"];
			
			
			
			if($_POST["conta"]=="corrente")
			{
				$tm = $_POST["taxa_manutencao"];
				$to = $_POST["taxa_operacao"];
			
				$cc = new ContaCorrente($nome,$nro,$data,$saldo,$tm,$to);
				
				$_SESSION["cc"][] = $cc;

				echo'<a href="listar_cc.php">Listar Contas Correntes</a>';

			}
			else
			{
				$tr = $_POST["taxa_rendimento"];
			
				$cp = new ContaPoupanca($nome,$nro,$data,$saldo,$tr);

				$_SESSION["cp"][] = $cp;

				echo'<a href="listar_cp.php">Listar Contas Poupança</a>';
			}
		?>
	
		
	</body>

</html>


