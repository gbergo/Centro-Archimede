<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_public.php';
    require_once __DIR__.'/../../class/query/orario.php';
    require_once __DIR__.'/../../class/query/image.php';
    require_once __DIR__.'/../../class/query/news.php';
    require_once __DIR__.'/../../class/pagine/menu/menu.php';
    require_once __DIR__.'/../../class/pagine/menu/staticMenu.php';
    require_once __DIR__.'/../../class/utility/EmptyBarGray.php';


    $controller = new controller();
    $controller->setPage(new page_public('home',(new menu((new staticPath())->public_menu('0'))),'content_home','en'));
    $controller->printHTML();
?>
