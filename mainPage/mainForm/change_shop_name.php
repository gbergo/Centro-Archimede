<?php 
	require_once __DIR__.'/../../class/sistema/controller_query.php';
	require_once __DIR__.'/../../class/query/shop_name_changer.php';

	$controller = new controller_query();
	$newname=new  name_change($_POST['nome_negozio']);
	$controller->setQuery($newname);
	$controller->update();
?>
