<?php 
	require_once __DIR__.'/../../class/sistema/controller_query.php';
	require_once __DIR__.'/../../class/query/orario.php';

	$controller = new controller_query();
	$orari=new  orario();
	$controller->setQuery($orari);
	$controller->update();
?>
