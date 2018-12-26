<?php 
	require_once __DIR__.'/../../class/sistema/controller_query.php';
	require_once __DIR__.'/../../class/query/log.php';

	$controller = new controller_query();
	$log =new login($_POST['username'],$_POST['password'],$_POST['Password_1']);
	$controller->setQuery($log);
	$controller->write();
?>