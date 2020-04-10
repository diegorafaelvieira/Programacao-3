<?php
session_start();
require_once 'config.php';

//LOGIN
if($_SESSION['logado'] == false) {
    
    if ( (!empty($_POST['nome'])) && (!empty($_POST['senha'])) ) {
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        
        $r = $db->prepare('SELECT nome,senha FROM transportador WHERE nome=:nome AND senha=md5(:senha)'); //md5
        $r->execute(array(':nome'=>$nome,':senha'=>$senha));
        $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
        
        if($r->rowCount() > 0) {
        $_SESSION['nome'] = $nome;
        $_SESSION['senha'] = md5($senha); //md5
        $_SESSION['logado'] = true;
        } else {
        header("location: login.php");
        }
    } else {
        header("location: login.php");
        }

               
}
//Aqui Caminhão
    //verifica se é vazio o form    
    if ((!empty($_POST['idCaminhao'])) && (!empty($_POST['transportadoraCaminhao'])) && (!empty($_POST['motorista']))) {
        //vars form
        $idCaminhao = $_POST['idCaminhao'];
        $transportadoraCaminhao = $_POST['transportadoraCaminhao'];
        $motorista = $_POST['motorista'];
        $nomeTransportador = $_SESSION['nome']; 
       
        //busca transportador
        $id = $db->prepare('SELECT idTransportador FROM transportador WHERE nome=:nomeTransportador');
        $id->execute(array(':nomeTransportador'=>$nomeTransportador));
        $linhas = $id->fetchAll(PDO::FETCH_ASSOC);
        foreach ($linhas as $linha) {$idTransportador = $linha['idTransportador'];}

        if ($id->rowCount() > 0) {
            $id2 = $db->prepare('SELECT idCaminhao FROM caminhao WHERE idCaminhao=:idCaminhao');
            $id2->execute(array(':idCaminhao'=>$idCaminhao));
    
            if ($id2->rowCount() > 0) {echo "já adicionado";}
            else {
                $r = $db->prepare('INSERT INTO caminhao (idCaminhao,transportadora,motorista,idTransportador) VALUES (:idCaminhao,:transportadoraCaminhao,:motorista,:idTransportador)');
                $r->execute(array(':idCaminhao'=>$idCaminhao,':transportadoraCaminhao'=>$transportadoraCaminhao,':motorista'=>$motorista,':idTransportador'=>$idTransportador));
                if($r->rowCount() > 0) {echo "cadastrou!";}
            }
    
        }

    }   

    //Aqui Navio
    //verifica se é vazio o form
    if ((!empty($_POST['idNavio'])) && (!empty($_POST['transportadoraNavio'])) && (!empty($_POST['comandante']))) {
        //vars form
        $idNavio = $_POST['idNavio'];
        $transportadoraNavio = $_POST['transportadoraNavio'];
        $comandante = $_POST['comandante'];
        $nomeTransportador = $_SESSION['nome'];

        $id = $db->prepare('SELECT idTransportador FROM transportador WHERE nome=:nomeTransportador');
        $id->execute(array(':nomeTransportador'=>$nomeTransportador));
        $linhas = $id->fetchAll(PDO::FETCH_ASSOC);
        foreach ($linhas as $linha) {$idTransportador = $linha['idTransportador'];}

        if ($id->rowCount() > 0) {
            $id2 = $db->prepare('SELECT idNavio FROM navio WHERE idNavio=:idNavio');
            $id2->execute(array(':idNavio'=>$idNavio));

            if ($id2->rowCount() > 0) {echo "já adicionado";}
            else {
                $r = $db->prepare('INSERT INTO navio (idNavio,transportadora,comandante,idTransportador) VALUES (:idNavio,:transportadoraNavio,:comandante,:idTransportador)');
                $r->execute(array(':idNavio'=>$idNavio,':transportadoraNavio'=>$transportadoraNavio,':comandante'=>$comandante,':idTransportador'=>$idTransportador));
                if($r->rowCount() > 0) {echo "cadastrou!";}
            }
        }
    }

    //excluir
    //Aqui Caminhão e Navio
    //verifica se é vazio o form    
    if ((!empty($_POST['id'])) AND (!empty($_POST['tipoVeiculo']))) {
        //vars form
        $id = $_POST['id'];
        $op = $_POST['tipoVeiculo'];
        $nomeTransportador = $_SESSION['nome'];

        //buscar usuario
        $idT = $db->prepare('SELECT idTransportador FROM transportador WHERE nome=:nomeTransportador');
        $idT->execute(array(':nomeTransportador'=>$nomeTransportador));
        $linhas = $idT->fetchAll(PDO::FETCH_ASSOC);
        foreach ($linhas as $linha) {$idTransportador = $linha['idTransportador'];}

        switch ($op){
            case "Cam":
                $sql = "DELETE FROM caminhao WHERE idCaminhao = '$id' AND idTransportador = '$idTransportador'";
                $db->query($sql);
                echo "Caminhão deletado!";
                break;
            case "Nav":
                $sql = "DELETE FROM navio WHERE idNavio = '$id' AND idTransportador = '$idTransportador'";
                $db->query($sql);
                echo "Navio deletado!";
                break;    
            default: echo "Selecione um veículo!";
        }
    }
    else{
        echo "Tipo de veículo ou id não informado!";
    }
?>



<!DOCTYPE html>
<html lang="pt">
<head>
        <title>TRANSPORTADOR</title>
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
                       
                       <li id="nome"><?php echo "Olá TRANSPORTADOR ".$_SESSION['nome']?></li>                      
                       <li><a href="logout.php">LOGOUT</a></li> 
                    </ul>
                </nav>
            </div>

        </div>
    </header>
    

    <section id="cadastro">
        <div class="container column">
            <div class="cadastro_options">

                <div class="cadastroCaminhao">
                    <h5>CADASTRO CAMINHÃO</h5> 
                   <form action="telaTransportador.php" method="POST">
                       PLACA:<br/>
                        <input type="text" name="idCaminhao" minlength="7" maxlength="7"><br/>
                        TRANSPORTADORA:<br/>
                        <input type="text" name="transportadoraCaminhao"><br/>
                        MOTORISTA:<br/>
                        <input type="text" name="motorista"><br/><br/>
                        <input type="submit" value="Cadastrar">
                        <input type="reset">
                    </form>  
                </div>
                
                <div class="cadastroNavio">
                    <h5>CADASTRO NAVIO</h5>
                    <form action="telaTransportador.php" method="POST">
                        MATRÍCULA:<br/>
                        <input type="text" name="idNavio" minlength="7" maxlength="7"><br/>
                        TRANSPORTADORA:<br/>
                        <input type="text" name="transportadoraNavio"><br/>
                        COMANDANTE:<br/>
                        <input type="text" name="comandante"><br/><br/>
                        <input type="submit" value="Cadastrar">
                        <input type="reset">
                    </form>  
                </div>
                 
            </div>
        </div>
    </section> 

    <!--consultas-->
    <section id="listasTranportador">
        <div class="container column">
        <h5>VEÍCULOS</h5>
            <div class="cadastro_options">
                <div class="cadastroCaminhao">
                    <!-- CONSULTA CAMINHÕES -->                        
                    <h6>CAMINHÕES</h6><br/>
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
                            $consultaC = $db->query("SELECT c.*, t.nome FROM caminhao as c LEFT JOIN transportador as t ON c.idTransportador = t.idTransportador");
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
                    <h6>NAVIOS</h6><br/>
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
                    <h5>REMOVER MEU VEÍCULO</h5><br/>
                    <form action="telaTransportador.php" method="POST">
                    <fieldset for="opRemover"><legend for="opRemover">* Tipo de veículo:</legend>
                    <input type="radio" name="tipoVeiculo" value="Cam"> Caminhão
                    <input type="radio" name="tipoVeiculo" value="Nav"> Navio <br/>
                    <label for="id">* Id veículo:</label>
                    <input type="text" name="id" for="id" minlength="7" maxlength="7">
                    <input type="submit" value="Remover">
                    </fieldset> 
                    </form>       
                </div>
            </div>
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