<?php 
	require_once __DIR__.'/../../class/sistema/controller_query.php';
	require_once __DIR__.'/../../class/query/contacts_changer.php';

	$controller = new controller_query();
	$infos=new infos_changer($_POST['Telefono'], $_POST['Email'], $_POST['Sito_web']);
	$controller->setQuery($infos);
	$controller->update();
	throw new exeption();
?>
