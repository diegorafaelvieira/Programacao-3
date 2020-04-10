<?php
session_start();
require_once 'config.php';

    if($_SESSION['logado'] == false) {
        if ( (!empty($_POST['nomeOperador'])) && (!empty($_POST['senhaOperador'])) ) {
            $nomeOperador = $_POST['nomeOperador'];
            $senhaOperador = $_POST['senhaOperador'];
        
            if (($nomeOperador == "Operador") && ($senhaOperador == "Operador")) {
                $_SESSION['nomeOperador'] = $nomeOperador;
                $_SESSION['senhaOperador'] = $senhaOperador;
                $_SESSION['logado'] = true;
            } else {header("location: login.php");
            }
        } else {header("location: login.php");
        }
    }
	 //excluir 
    //Aqui Caminhão e Navio
    //verifica se é vazio o form    
    if ((!empty($_POST['id'])) AND (!empty($_POST['tipoVeiculo']))) {
        //vars form
        $id = $_POST['id'];
        $op = $_POST['tipoVeiculo'];
       

        //buscar usuario
        $idT = $db->prepare('SELECT idTransportador FROM transportador WHERE nome=:nomeTransportador');
       
        $linhas = $idT->fetchAll(PDO::FETCH_ASSOC);
        foreach ($linhas as $linha) {$idTransportador = $linha['idTransportador'];}

        switch ($op){
            case "Cam":
                $sql = "DELETE FROM caminhao WHERE idCaminhao = '$id'"; 
                $db->query($sql);
                echo "Caminhão deletado!";
                break;
            case "Nav":
                $sql = "DELETE FROM navio WHERE idNavio = '$id' "; 
                $db->query($sql);
                echo "Navio deletado!";
                break;    
            default: echo "Selecione um veículo!";
        }
    }
    else{
        echo "Tipo de veículo ou id não informado!";
    }
	
	//Aqui Descarregar Caminhão   
	if ((!empty($_POST['idContainerCaminhao'])) && (!empty($_POST['descricaoContainerCaminhao'])) && (!empty($_POST['localizacaoContainerCaminhao'])) && (!empty($_POST['codOrigemContainerCaminhao'])) && (!empty($_POST['codDestinoContainerCaminhao']))) {
        $idContainerCaminhao = $_POST['idContainerCaminhao'];
        $descricaoContainerCaminhao = $_POST['descricaoContainerCaminhao'];
        $localizacaoContainerCaminhao = $_POST['localizacaoContainerCaminhao'];
        $codOrigemContainerCaminhao = $_POST['codOrigemContainerCaminhao'];
        $codDestinoContainerCaminhao = $_POST['codDestinoContainerCaminhao'];

        $idContainer = $db->prepare('SELECT idContainer FROM container WHERE idContainer=:idContainerCaminhao');
        $idContainer->execute(array(':idContainerCaminhao'=>$idContainerCaminhao));
        $linhas = $idContainer->fetchAll(PDO::FETCH_ASSOC);
        //NÃO TEM CONTAINER CADASTRADO
        if ($idContainer->rowCount() == 0) {
            
            $idOrigemCaminhao = $db->prepare('SELECT idCaminhao FROM caminhao WHERE idCaminhao=:codOrigemContainerCaminhao');
            $idOrigemCaminhao->execute(array(':codOrigemContainerCaminhao'=>$codOrigemContainerCaminhao));
            $linhas2 = $idOrigemCaminhao->fetchAll(PDO::FETCH_ASSOC);
            //EXISTE CAMINHÃO -> ORIGEM
            if ($idOrigemCaminhao->rowCount() > 0) {
                
                //VERIFICAÇÃO SE TEM CAMINHÃO
                $idDestinoCaminhao1 = $db->prepare('SELECT idCaminhao FROM caminhao WHERE idCaminhao=:codDestinoContainerCaminhao');
                $idDestinoCaminhao1->execute(array(':codDestinoContainerCaminhao'=>$codDestinoContainerCaminhao));
                $linhas3 = $idDestinoCaminhao1->fetchAll(PDO::FETCH_ASSOC);
                //VERIFICAÇÃO SE TEM NAVIO->DESTINO
                $idDestinoCaminhao2 = $db->prepare('SELECT idNavio FROM navio WHERE idNavio=:codDestinoContainerCaminhao');
                $idDestinoCaminhao2->execute(array(':codDestinoContainerCaminhao'=>$codDestinoContainerCaminhao));
                $linhas4 = $idDestinoCaminhao2->fetchAll(PDO::FETCH_ASSOC);
                //JÁ TEM DESTINO DO CONTAINER JÁ FOI CADASTRADO
                if (($idDestinoCaminhao1->rowCount() > 0) or ($idDestinoCaminhao2->rowCount() > 0)) {
                    //VERIFICA SE ORIGEM != DESTINO
                    if ($codOrigemContainerCaminhao != $codDestinoContainerCaminhao) {

                        //VERIFICA A FILA
                        $resultado = $db->query("SELECT idCaminhao,dtChegada FROM caminhao ORDER BY dtChegada DESC");
                        $cont = 0;
                        foreach($resultado as $linhad) {
                            if ($cont == 0) {
                                $idUltimoCaminhao = $linhad['idCaminhao'];
                                $dataMaior = $linhad['dtChegada'];
                                $cont++;
                                if ($codOrigemContainerCaminhao == $idUltimoCaminhao) {
                                
                                    //AQUI INSIRO O CONTAINER
                                    $r = $db->prepare('INSERT INTO container(idContainer,descricao,localizacao,origem,destino,dtEntrada,dtSaida) VALUES (:idContainer, :descricao, :localizacao, :origem, :destino, now(), null)');
                                    $r->execute(array(':idContainer'=>$idContainerCaminhao,':descricao'=>$descricaoContainerCaminhao,':localizacao'=>$localizacaoContainerCaminhao,':origem'=>$codOrigemContainerCaminhao,'destino'=>$codDestinoContainerCaminhao));
                                    if ($r->rowCount() > 0) {
                                        echo "Container cadastrado! Origem: ".$codOrigemContainerCaminhao." com Destino: ".$codDestinoContainerCaminhao;
                                    }
                                } else {
                                    echo "Descarregue o 1º caminhão da fila!";
                                }
                            }
                        }                                             
                    } else {
                        echo "Origem e Destino devem ser diferentes!";
                    }
                } else {
                    echo "Destino não localizado!";
                }
            } else {
                echo "Origem não existe!";
            }
        } else {
            echo "Container já descarregado!";
        }
    }

	//AQUI CARREGO O CAMINHÃO
	if ((!empty($_POST['codigoCarregCaminhao'])) && (!empty($_POST['destinoCarregCaminhao']))) {
        $codigoCarregCaminhao = $_POST['codigoCarregCaminhao'];
        $destinoCarregCaminhao = $_POST['destinoCarregCaminhao'];

        $r = $db->prepare('SELECT idContainer FROM container WHERE idContainer=:codigoCarregCaminhao AND destino=:destinoCarregCaminhao');
        $r->execute(array(':codigoCarregCaminhao'=>$codigoCarregCaminhao,':destinoCarregCaminhao'=>$destinoCarregCaminhao));
        $linhas = $r->fetchAll(PDO::FETCH_ASSOC);

        if ($r->rowCount() > 0) { 
            //VERIFICAR SE É O CONTAINER CORRETO
            $r2 = $db->prepare('SELECT idCaminhao FROM caminhao WHERE idCaminhao=:destinoCarregCaminhao');
            $r2->execute(array(':destinoCarregCaminhao'=>$destinoCarregCaminhao));
            $linhas2 = $r2->fetchAll(PDO::FETCH_ASSOC);

            if ($r2->rowCount() > 0) { 
                //IDdestino É O idNavio -> REMOVE 
                $resultado = $db->query('SELECT idContainer,dtEntrada FROM container ORDER BY dtEntrada DESC');
                $cont = 0;
                foreach($resultado as $linhad) {
                    if ($cont == 0) {
                        $idUltimoContainer = $linhad['idContainer'];
                        $dataMaior = $linhad['dtEntrada'];
                        $cont++;
                        if ($codigoCarregCaminhao == $idUltimoContainer) {
                            //AQUI É INSERIDO NO LOG
                            $log = $db->prepare('INSERT INTO carregamentoCaminhao(dtCarregamentoCaminhao,idCaminhao,idContainer) VALUES (now(),:destino, :idContainer)');
                            $log->execute(array(':destino'=>$destinoCarregCaminhao,':idContainer'=>$codigoCarregCaminhao));

                            //AQUI É REMOVIDO!
                            $r = $db->prepare('DELETE FROM container WHERE idContainer= :codigoCarregCaminhao');
                            $r->execute(array(':codigoCarregCaminhao'=>$codigoCarregCaminhao));
                            echo "Container ".$codigoCarregCaminhao." carregado em ".$destinoCarregCaminhao."!";}
                        } else {
                            echo "Selecione o 1º container da fila!";
                        }
                    }
                }
            } else {
                echo "O container ".$codigoCarregCaminhao." pertence a um navio!";
            }
    } else {
        echo "Dados incorretos!";
    }
    
	
	//AQUI DESCARREGAR NAVIO  
    require 'config.php';
    if ((!empty($_POST['idContainerNavio'])) && (!empty($_POST['descricaoContainerNavio'])) && (!empty($_POST['localizacaoContainerNavio'])) && (!empty($_POST['codOrigemContainerNavio'])) && (!empty($_POST['codDestinoContainerNavio']))) {
        $idContainerNavio = $_POST['idContainerNavio'];
        $descricaoContainerNavio = $_POST['descricaoContainerNavio'];
        $localizacaoContainerNavio = $_POST['localizacaoContainerNavio'];
        $codOrigemContainerNavio = $_POST['codOrigemContainerNavio'];
        $codDestinoContainerNavio = $_POST['codDestinoContainerNavio'];

        $idContainer = $db->prepare('SELECT idContainer FROM container WHERE idContainer=:idContainerNavio');
        $idContainer->execute(array(':idContainerNavio'=>$idContainerNavio));
        $linhas = $idContainer->fetchAll(PDO::FETCH_ASSOC);
        //NÃO TEM CONTAINER CADASTRADO
        if ($idContainer->rowCount() == 0) {
            
            $idOrigemNavio = $db->prepare('SELECT idNavio FROM navio WHERE idNavio=:codOrigemContainerNavio');
            $idOrigemNavio->execute(array(':codOrigemContainerNavio'=>$codOrigemContainerNavio));
            $linhas2 = $idOrigemNavio->fetchAll(PDO::FETCH_ASSOC);
            //EXISTE NAVIO -> ORIGEM
            if ($idOrigemNavio->rowCount() > 0) {
                
                 //VERIFICAÇÃO SE TEM CAMINHÃO
                $idDestinoNavio1 = $db->prepare('SELECT idNavio FROM navio WHERE idNavio=:codDestinoContainerNavio');
                $idDestinoNavio1->execute(array(':codDestinoContainerNavio'=>$codDestinoContainerNavio));
                $linhas3 = $idDestinoNavio1->fetchAll(PDO::FETCH_ASSOC);
                //VERIFICAÇÃO SE TEM NAVIO->DESTINO
                $idDestinoNavio2 = $db->prepare('SELECT idCaminhao FROM caminhao WHERE idCaminhao=:codDestinoContainerNavio');
                $idDestinoNavio2->execute(array(':codDestinoContainerNavio'=>$codDestinoContainerNavio));
                $linhas4 = $idDestinoNavio2->fetchAll(PDO::FETCH_ASSOC);
                 //JÁ TEM DESTINO DO CONTAINER JÁ FOI CADASTRADO
                if (($idDestinoNavio1->rowCount() > 0) or ($idDestinoNavio2->rowCount() > 0)) {//tem destino cadastrado - pode cadastrar o container
                    
                    if ($codOrigemContainerNavio != $codDestinoContainerNavio) {//placa origem diferente placa destino

                         //VERIFICA A FILA
                        $resultado = $db->query('SELECT idNavio,dtChegada FROM navio ORDER BY dtChegada DESC');
                        $cont = 0;
                        foreach($resultado as $linhad) {
                            if ($cont == 0) {
                                $idUltimoNavio = $linhad['idNavio'];
                                $dataMaior = $linhad['dtChegada'];
                                $cont++;
                                if ($codOrigemContainerNavio == $idUltimoNavio) {
                                
                                    //AQUI INSIRO O CONTAINER
                                    $r = $db->prepare('INSERT INTO container(idContainer,descricao,localizacao,origem,destino,dtEntrada,dtSaida) VALUES (:idContainer, :descricao, :localizacao, :origem, :destino,now(),null)');
                                    $r->execute(array(':idContainer'=>$idContainerNavio,':descricao'=>$descricaoContainerNavio,':localizacao'=>$localizacaoContainerNavio,':origem'=>$codOrigemContainerNavio,'destino'=>$codDestinoContainerNavio));
                                    if ($r->rowCount() > 0) {echo "Container ".$idContainerNavio." cadastrado! Origem: ".$codOrigemContainerNavio." Destino: ".$codDestinoContainerNavio;}
                                } else {
                                    echo "Descarregue o 1º navio da fila!";
                                }
                            }
                        }               
                    } else {echo "$codOrigemContainerNavio. e Destino ".$codDestinoContainerNavio.") devem ser diferentes!";}
                } else {
                    echo "$codDestinoContainerNavio. não existe!";
                }
            } else {
                echo "$codOrigemContainerNavio., de origem, não existe!";
            }
        } else {echo "$idContainerNavio. já fora descarregado!";}
    }


    //AQUI CARREGAR NAVIO 
	if ((!empty($_POST['codigoCarregNavio'])) && (!empty($_POST['destinoCarregNavio']))) {
        $codigoCarregNavio = $_POST['codigoCarregNavio'];
        $destinoCarregNavio = $_POST['destinoCarregNavio'];

        $r = $db->prepare('SELECT idContainer FROM container WHERE idContainer=:codigoCarregNavio AND destino=:destinoCarregNavio');
        $r->execute(array(':codigoCarregNavio'=>$codigoCarregNavio,':destinoCarregNavio'=>$destinoCarregNavio));
        $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
        //VERIFICO SE EXISTE O CONTAINER CERTO
        if ($r->rowCount() > 0) { 
            $r2 = $db->prepare('SELECT idNavio FROM Navio WHERE idNavio=:destinoCarregNavio');
            $r2->execute(array(':destinoCarregNavio'=>$destinoCarregNavio));
            $linhas2 = $r2->fetchAll(PDO::FETCH_ASSOC);
            //O idDestino É idNavio DAÍ DELETA
            if ($r2->rowCount() > 0) { 
                
                $resultado = $db->query('SELECT idContainer,dtEntrada FROM container ORDER BY dtEntrada DESC');
                $cont = 0;
                foreach($resultado as $linhad) {
                    if ($cont == 0) {
                        $idUltimoContainer = $linhad['idContainer'];
                        $dataMaior = $linhad['dtEntrada'];
                        $cont++;
                        if (strtolower($codigoCarregNavio) == $idUltimoContainer) {
                            //AQUI INSIRO NO LOG
                            $log = $db->prepare('INSERT INTO carregamentoNavio(dtCarregamentoNavio,idNavio,idContainer) VALUES (now(),:destino, :idContainer)');
                            $log->execute(array(':destino'=>$destinoCarregNavio,':idContainer'=>$codigoCarregNavio));

                            //AQUI REMOVO O CONTAINER
                            $r = $db->prepare('DELETE FROM container WHERE idContainer= :codigoCarregNavio');
                            $r->execute(array(':codigoCarregNavio'=>$codigoCarregNavio));
                            echo "Container ".$codigoCarregNavio." carregado em ".$destinoCarregNavio."!";
                        }
                        } else {
                            echo "Selecione o 1º container da fila!";
                        }
                    }
                }
            } else {
                echo "O container ".$codigoCarregNavio." pertence a um navio!";
            }
    } else {
        echo "Dados incorretos!";
    }
?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<title>OPERADOR</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/css/estilos.css">
    <script type="text/javascript" src="assets/js/pace.min.js"></script>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!--------------------------------------------Scripts------------------------------------------------>
    <!--Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    
    <!-- JQuery & AJAX-->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
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
						<li id="nome"><?php echo "Bem Vindo OPERADOR "?></li>
						<li><a href="logout.php">LOGOUT</a></li>
					</ul>
				</nav>
			</div>

		</div>
	</header>

	<section id=listasOperador>
		<div class="container column">
            <div class="cadastro_options">
                <div class="cadastroCaminhao">
                    <!-- CONSULTA FILA CAMINHÕES -->                        
                    <h5>CAMINHÕES</h5>
                    <div id="Layer1" style="position:relative;  width:100%; height:85%; z-index:1; overflow: auto">
                        <table class='table table-striped table-dark'>
                            <thead>
                            <tr>
                                <th scope='col'>Placa</th>
                                <th scope='col'>Transportadora</th>
                                <th scope='col'>Motorista</th>
                                <th scope='col'>Nome Transportador</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $consultaC = $db->query("SELECT c.*, t.nome FROM caminhao as c LEFT JOIN transportador as t ON c.idTransportador = t.idTransportador ");
                            $linhas = $consultaC->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($linhas as $i => $result) {
                                echo "
                                    <tr>
                                        <th scope='row'>".$result['idCaminhao']."</th>
                                            <td>".$result['transportadora']."</td>
                                            <td>".$result['motorista']."</td>
                                            <td>".$result['nome']."</td>
                                    </tr>
                                ";
                            }
                            ?>
                            </tbody>
                        </table>
                     </div>
                </div>

                <div class="cadastroNavio">
                    <!-- CONSULTA NAVIOS -->
                    <h5>NAVIOS</h5>
                    <div id="Layer1" style="position:relative;  width:100%; height:85%; z-index:1; overflow: auto">
                        <table class='table table-striped table-dark'>
                            <thead>
                            <tr>
                                <th scope='col'>Matrícula</th>
                                <th scope='col'>Transportadora</th>
                                <th scope='col'>Comandante</th>
                                <th scope='col'>Nome Transportador</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $consultaC = $db->query("SELECT n.*, t.nome FROM navio as n LEFT JOIN transportador as t ON n.idTransportador = t.idTransportador");
                            $linhas = $consultaC->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($linhas as $i => $result) {
                                echo "
                                    <tr>
                                        <th scope='row'>".$result['idNavio']."</th>
                                            <td>".$result['transportadora']."</td>
                                            <td>".$result['comandante']."</td>
                                            <td>".$result['nome']."</td>
                                    </tr>
                                ";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>    
        	</div>
    	</div>
	</section>

	<!--remover-->
    <section id="remover">
        <div class="container column">
            <div class="cadastro_options">
                <div class="removerVeiculos">
                    <h5>REMOVER VEÍCULO</h5><br/>
                    <form action="telaOperador.php" method="POST">
                    <fieldset for="opRemover"><legend for="opRemover">* Tipo de veículo:</legend>
                    <input type="radio" name="tipoVeiculo" value="Cam"> Caminhão
                    <input type="radio" name="tipoVeiculo" value="Nav"> Navio <br/>
                    <label for="id">* Id veículo:</label>
                    <input type="text" name="id" for="id" minlength="7" maxlength="7">
                    <input type="submit" value="Remover">
                    <input type="reset">
                    </fieldset> 
                    </form>       
                </div>
            </div>
        </div>         
    </section>

	<section id="listasContainer">
		<div class="container column">
			<div class="carregar_options">
				<div class="filaContainers">
					<h5>FILA DE CONTAINERS</h5>
					<div id="Layer1" style="position:relative;  width:100%; height:85%; z-index:1; overflow: auto">
                        <table class='table table-striped table-dark'>
                            <thead>
                            <tr>
                                <th scope='col'>Id Container</th>
                                <th scope='col'>Descrição</th>
                                <th scope='col'>Localização</th>
                                <th scope='col'>Origem</th>
								<th scope='col'>Destino</th>
								<th scope='col'>Data Entrada</th>
								<th scope='col'>Data Saída</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
							$consultaCont = $db->query("SELECT idContainer,descricao,localizacao,origem,destino,dtEntrada,dtSaida FROM container ORDER BY dtEntrada DESC");
                            $linhas = $consultaCont->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($linhas as $i => $result) {
                                echo "
                                    <tr>
                                        <th scope='row'>".$result['idContainer']."</th>
                                            <td>".$result['descricao']."</td>
											<td>".$result['localizacao']."</td>
											<td>".$result['origem']."</td>
											<td>".$result['destino']."</td>
											<td>".$result['dtEntrada']."</td>
											<td>".$result['dtSaida']."</td>
                                            
                                    </tr>
                                ";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
			    </div>    
            </div>
        </div>   
	</section>


    <section id="listasCarregamentos">
		<div class="container column">
			<div class="carregar_options">

				<div class="filaCarregamentosCaminhao">
                <h5>CARREGAMENTO CONTAINERS CAMINHAO</h5>
					<div id="Layer1" style="position:relative;  width:100%; height:85%; z-index:1; overflow: auto">
                        <table class='table table-striped table-dark'>
                            <thead>
                            <tr>
                                <th scope='col'>Id Carregamento Caminhão</th>
                                <th scope='col'>Data Carregamento</th>
                                <th scope='col'>Id Caminhão</th>
                                <th scope='col'>Id Container</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
							$consultaCont = $db->query("SELECT idCarregamentoCaminhao,dtCarregamentoCaminhao,idCaminhao,idContainer FROM carregamentocaminhao ORDER BY dtCarregamentoCaminhao DESC");
                            $linhas = $consultaCont->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($linhas as $i => $result) {
                                echo "
                                    <tr>
                                        <th scope='row'>".$result['idCarregamentoCaminhao']."</th>
                                            <td>".$result['dtCarregamentoCaminhao']."</td>
											<td>".$result['idCaminhao']."</td>
											<td>".$result['idContainer']."</td>    
                                    </tr>
                                ";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="filaCarregamentosNavio">
                    <h5>CARREGAMENTO CONTAINERS NAVIO</h5>
					<div id="Layer1" style="position:relative;  width:100%; height:85%; z-index:1; overflow: auto">
                        <table class='table table-striped table-dark'>
                            <thead>
                            <tr>
                                <th scope='col'>Id Carregamento Navio</th>
                                <th scope='col'>Data Carregamento</th>
                                <th scope='col'>Id Navio</th>
                                <th scope='col'>Id Container</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
							$consultaCont = $db->query("SELECT idCarregamentoNavio,dtCarregamentoNavio,idNavio,idContainer FROM carregamentonavio ORDER BY dtCarregamentoNavio DESC");
                            $linhas = $consultaCont->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($linhas as $i => $result) {
                                echo "
                                    <tr>
                                        <th scope='row'>".$result['idCarregamentoNavio']."</th>
                                            <td>".$result['dtCarregamentoNavio']."</td>
											<td>".$result['idNavio']."</td>
											<td>".$result['idContainer']."</td>    
                                    </tr>
                                ";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<section id=carregar>
		<div class="container column">
			<div class="carregar_options">
				<div class="carregarNavio">
					<h5>CARREGAR CONTAINER NAVIO</h5>
					<form action="telaOperador.php" method="POST">
                        CÓDIGO CONTAINER:<br/>
                        <input type="number" name="codigoCarregNavio" min="1" max="999"><br/>
                        DESTINO:<br/>
                        <input type="text" name="destinoCarregNavio" minlength="7" maxlength="7"><br/><br/>
                        <input type="submit" value="Carregar">
                        <input type="reset">
                    </form>
				</div>

				<div class="carregarCaminhao">
					<h5>CARREGAR CONTAINER CAMINHÃO</h5>
					<form action="telaOperador.php" method="POST">
                        CÓDIGO CONTAINER:<br>
                        <input type="number" name="codigoCarregCaminhao" min="1" max="999"><br/>
                        DESTINO:<br>
                        <input type="text" name="destinoCarregCaminhao" minlength="7" maxlength="7"><br/><br/>
                        <input type="submit" value="Carregar">
                        <input type="reset">
                    </form>
				</div>
			</div>
		</div>
	</section>

	<section id=descarregar>
		<div class="container column">
			<div class="carregar_options">
				<div class="descarregarNavio">
					<h5>DESCARREGAR CONTAINER NAVIO</h5>
					<form action="telaOperador.php" method="post">
                        CÓDIGO CONTAINER:<br/>
                        <input type="number" name="idContainerNavio" min="1" max="999"><br/>
                        DESCRIÇÃO:<br/>
                        <input type="text" name="descricaoContainerNavio"><br/>
                        LOCALIZAÇÃO:<br/>
                        <input type="text" name="localizacaoContainerNavio" maxlength="3"><br/>
                        ORIGEM:<br/>
                        <input type="text" name="codOrigemContainerNavio" minlength="7" maxlength="7"><br/>
                        DESTINO:<br/>
                        <input type="text" name="codDestinoContainerNavio" minlength="7" maxlength="7"><br/><br/>
                        <input type="submit" value="Descarregar">
                        <input type="reset">
                    </form>
				</div>

				<div class="descarregarCaminhao">
					<h5>DESCARREGAR CONTAINER CAMINHÃO</h5>
					<form action="telaOperador.php" method="post">
                        CÓDIGO CONTAINER:<br/>
                        <input type="number" name="idContainerCaminhao" min="1" max="999"><br/>
                        DESCRIÇÃO:<br/>
                        <input type="text" name="descricaoContainerCaminhao"><br/>
                        LOCALIZAÇÃO:<br/>
                        <input type="text" name="localizacaoContainerCaminhao" maxlength="3"><br/>
                        ORIGEM:<br/>
                        <input type="text" name="codOrigemContainerCaminhao" minlength="7" maxlength="7"><br/>
                        DESTINO:<br/>
                        <input type="text" name="codDestinoContainerCaminhao" minlength="7" maxlength="7"><br/><br/>
                        <input type="submit" value="Descarregar">
                        <input type="reset">
                    </form>
				</div>
			</div>
		</div>
	</section>		

	<br/><br/><br/><br/>	

	<footer id="rodape">
		<p>Copyright &copy; 2019 - by Diego Rafael Vieira <br/>
			<a href="https://www.linkedin.com/in/diegorafaelvieira/" target="_blank"> LinkedIn</a>
		</p>
	</footer>

</body>
</html>