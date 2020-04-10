<form action="exercicio3.php" method="GET"> 
    NOME:<br>
    <input type="text" name="nome"><br/><br/>
    IDADE:<br>
    <input type="number" name="idade" min="0"><br/>
    <input type="submit" value="Enviar dados"><br/>
</form>

<?php
    session_start();
    //$pessoas($_GET['nome'])
    //$array = $pessoas;
    if((!empty($_GET['nome'])) || (!empty($_GET['idade'])) ){
        $nome = $_GET['nome'];
        $idade = $_GET['idade'];
        
        if(($nome != null) && ($idade != null) ){
            $_SESSION['$nome'] = $nome;
            $_SESSION['$idade'] = $idade;

            echo $_SESSION['$nome'];
            
            $_SESSION['idade'] += $idade;
            echo "Total idade: ".$_SESSION['idade'];
       
        }
      
    } 


?>