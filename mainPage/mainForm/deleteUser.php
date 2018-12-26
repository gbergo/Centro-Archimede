<?php 
	require_once __DIR__.'/../../class/sistema/controller_query.php';
	require_once __DIR__.'/../../class/query/log.php';

	$controller = new controller_query();
	$log =new login($_POST['elimina_negozio']);
	$controller->setQuery($log);
	$controller->delete();
?>
