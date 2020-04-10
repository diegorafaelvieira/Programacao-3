<?php
session_start();
require 'config.php';
$_SESSION['logado'] = false;


if (isset($_POST['nome']) && empty($_POST['nome']) == false) {
	
	$nome = addslashes($_POST['nome']);
	$senha = md5(addslashes($_POST['senha']));

	$sql = "SELECT nome,senha FROM transportador WHERE nome = '$nome' AND senha = '$senha' ";
	$db->query($sql);

	if ($sql->rowCount() > 0) {

		$dado = $sql->fetch();

		$_SESSION['idTransportador'] = $dado['idTransportador'];

		header("Location: telaTransportador.php");
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>PORTO</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="assets/css/estilos.css">
	<script type="text/javascript" src="assets/js/pace.min.js"></script>
</head>

<body>

	<header>
		<div class="containerLogin">
			<div class="logo">
				<a href=""><img src="assets/imagens/logoPorto.png" /></a>
			</div> 
		</div>
	</header>

	
	<section id="login">
		<div class="login">
			<h4>LOGIN OPERADOR</h4>
			<form action="telaOperador.php" method="POST">
				USUÁRIO:<br/>
				<input type="text" name="nomeOperador"><br/>
				SENHA:<br/>
				<input type="password" name="senhaOperador"><br/><br/>
				<input type="submit" value="Entrar" id="btnEntrar">
				<input type="reset"><br/><br/> 	
			</form>

			
			<h4>LOGIN TRANSPORTADOR</h4>
			<form action="telaTransportador.php" method="POST">
				USUÁRIO:<br/>
				<input type="text" name="nome"><br/>
				SENHA:<br/>
				<input type="password" name="senha"><br/><br/>
				<input type="submit" value="Entrar">
				<input type="reset"><br/><br/>
			</form>


			<button id="botaoCadastrarnome" onclick="window.location.href='cadastrarTransportador.php'">Cadastrar Novo Transportador</button>
			<br/><br/>		
		</div>
	</section>


	<footer id="rodape">
		<p>Copyright &copy; 2019 - by Diego Rafael Vieira <br/>
			<a href="https://www.linkedin.com/in/diegorafaelvieira/" target="_blank"> LinkedIn</a>
		</p>
	</footer>


</body>
</html>