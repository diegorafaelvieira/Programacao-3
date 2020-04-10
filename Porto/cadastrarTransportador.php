<?php
session_start();
require 'config.php';
if (isset($_POST['nome']) && empty($_POST['nome']) == false) {
	
	$nome = addslashes($_POST['nome']);
	$senha = md5(addslashes($_POST['senha']));
	
	$sql = "INSERT INTO transportador SET nome = '$nome', senha = '$senha' "; 
	//EXECUTAR
	$db->query($sql);
	
	header("Location: login.php");
}

?>	

<!DOCTYPE html>
<html lang="pt">
<head>
    <title>CADASTRO TRANSPORTADOR</title>
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
		<div class="container">
			<div class="logo">
				<a href=""><img src="assets/imagens/logoPorto.png" /></a>
			</div>

			<div class="menu">
				<nav>
					<ul>
				        <li><a href="login.php">HOME</a></li>
					</ul>
				</nav>
			</div>

		</div>
	</header>

    <section id="cadastroUsuario">

                <div class="cadastrarUsuario">
                    <h4>CADASTRO TRANSPORTADOR</h4>
                    <form method="POST">
                    USUÁRIO:<br/>
                    <input type="text" name="nome"><br/>
                    SENHA:<br/>
                    <input type="password" name="senha"><br/><br/>
                    <input type=submit value="Cadastrar">
                    <input type="reset">
                    </form>
                   
                </div>
  
    </section>

    <br/><br/>	

    <footer id="rodape">
		<p>Copyright &copy; 2019 - by Diego Rafael Vieira <br/>
		<a href="https://www.linkedin.com/in/diegorafaelvieira/" target="_blank"> LinkedIn</a>
		</p>
	</footer>
    
</body>
</html>