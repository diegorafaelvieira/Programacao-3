<?php
	
	try {
		$db = new PDO('mysql:host=localhost;dbname=porto;charset=utf8','root','');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (ExceptionPDO $e) {
		echo "Falhou a conexão: ".$e->getMessage();
	}
?>