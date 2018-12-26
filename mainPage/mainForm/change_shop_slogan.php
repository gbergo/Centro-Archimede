<?php 
	require_once __DIR__.'/../../class/sistema/controller_query.php';
	require_once __DIR__.'/../../class/query/shop_slogan_changer.php';

	$controller = new controller_query();
	$newname=new shop_slogan($_POST['testo_motto'], $_POST['testo_descrizione']);
	$controller->setQuery($newname);
	$controller->update();
?>
