<?php 
	require_once __DIR__.'/../../class/sistema/controller_query.php';
	require_once __DIR__.'/../../class/query/log.php';

	$controller = new controller_query();
	$log =new login($_SESSION['user'],$_POST['nuova_password'],$_POST['conferma_nuova_password'],$_SESSION['type']);
	$controller->setQuery($log);
	$controller->update();
?>
