<?php
    include_once 'classes/Producao.class.php';
    include_once 'classes/Pessoa.class.php';
    include_once 'classes/Ator.class.php';
    include_once 'classes/Diretor.class.php';
    include_once 'classes/Filme.class.php';
    include_once 'classes/Serie.class.php';
?>


<?php
    //CRIA ATOR FILME
    $af = new Ator();
    $af->setNome("Uma Thurman");
    $af->setHabilidades("Sabe lutar kung-fu e com espada");
    

    //CRIA ATOR SERIE
    $as = new Ator();
    $as->setNome("Bryan Cranston");
    $as->setHabilidades("Say My Name");


    //CRIA DIRETOR FILME
    $df = new Diretor();
    $df->setNome("Quentin Tarantino");
    $df->setReconhecimento(9);
    

    //CRIA DIRETOR SERIE
    $ds = new Diretor();
    $ds->setNome("Vince Gilligan");
    $ds->setReconhecimento(8);


    //CRIA FILME
	$filme = new Filme();
	$filme->setNome("Kill Bill");
	$filme->setAtorPrincipal($af);
	$filme->setDiretor($df);
	$filme->setAno(2003);
	$filme->setDuracao(111);
    

    //CRIA SERIE
    $serie = new Serie();
    $serie->setNome("Breaking Bad");
    $serie->setAtorPrincipal($af);
	$serie->setDiretor($df);
	$serie->setNumeroDeTemporadas(5);


    //IMPRIME FILME
    echo "FILME: ".$filme->getNome()."<br/>";
    echo "ATOR PRINCIPAL: ".$af->getNome()."<br/>";
    echo "HABILIDADES ATOR: ".$af->getHabilidades()."<br/>";
    echo "DIRETOR: ".$df->getNome()."<br/>";
    echo "RECONHECIMENTO DIRETOR: ".$df->getReconhecimento()."<br/>";
    echo "ANO: ".$filme->getAno()."<br/>";
    echo "DURAÇÃO: ".$filme->getDuracao()." minutos"."<br/><br/>";

   
    //IMPRIME SERIE
    echo "SÉRIE: ".$serie->getNome()."<br/>";
    echo "ATOR PRINCIPAL: ".$as->getNome()."<br/>";
    echo "HABILIDADES ATOR: ".$as->getHabilidades()."<br/>";
    echo "DIRETOR: ".$ds->getNome()."<br/>";
    echo "RECONHECIMENTO DIRETOR: ".$ds->getReconhecimento()."<br/>";
    echo "NÚMERO DE TEMPORADAS: ".$serie->getNumeroDeTemporadas()."<br/>";

?>