<html>
<head>
	<meta charset="utf8">
</head>
<body>	
	<h1>Mapping: classes Equipe e Atleta</h1>
<?php
	include_once 'classes/Equipe.class.php';
	include_once 'classes/Atleta.class.php';

	$equipes = array();
	
	$db = new PDO('mysql:host=localhost;dbname=aula18;charset=utf8','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	try {
		$select1 = 'SELECT id, nome, cidade FROM Equipe';
		$r1 = $db->query($select1);
		$r1->setFetchMode(PDO::FETCH_CLASS,'Equipe');

		$select2 = 'SELECT id, nome, sobrenome, posicao FROM Atleta WHERE equipe_id = :id';
		$r2 = $db->prepare($select2);

		while ($equipe = $r1->fetch()) {
			$r2->bindValue(':id', $equipe->getId(), PDO::PARAM_INT);
			$r2->execute();			
			$r2->setFetchMode(PDO::FETCH_CLASS,'Atleta');
			
			while ($atleta = $r2->fetch()) {
				$equipe->addAtleta($atleta);
			}
			
			$equipes[] = $equipe;
		}
	} catch(PDOException $exception) {
		echo "<p>Occorreu um erro!</p>";
	    echo $exception->getMessage();
	}
	
	foreach($equipes as $equipe) {
		echo '<p>Equipe <b>'.$equipe->getNome().'</b> de <b>'.$equipe->getCidade().'</b></p>';
		foreach($equipe->getAtletas() as $atleta) {
			echo $atleta->getNome().' '.$atleta->getSobrenome().' - '.$atleta->getPosicao().'<br>';
		}
	}
?>
</body>
</html>