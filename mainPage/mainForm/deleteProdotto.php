<?php 
	require_once __DIR__.'/../../class/sistema/controller_query.php';
	require_once __DIR__.'/../../class/query/image.php';

	$controller = new controller_query();
	$prodotto =new image('prodotto',$_SESSION['user']);
	$controller->setQuery($prodotto);
	$controller->delete();
?>
