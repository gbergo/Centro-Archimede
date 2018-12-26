<?php 
	require_once __DIR__.'/../../class/sistema/controller_query.php';
	require_once __DIR__.'/../../class/query/news.php';

	$controller = new controller_query();
	$news =new news('NOVITA',$_POST['data'],$_POST['testo']);
	$controller->setQuery($news);
    $controller->write();
?>