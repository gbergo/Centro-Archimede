<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_private.php';
    require_once __DIR__.'/../../class/query/news.php';
    require_once __DIR__.'/../../class/pagine/menu/menu.php';
    require_once __DIR__.'/../../class/pagine/menu/staticMenu.php';
    require_once __DIR__.'/../../class/utility/lang.php';


    $controller = new controller();
    $controller->setPage(new page_private('Eventi','content_eventi',(new menu((new staticPath())->admin('1'))), 'general_admin'));
    $controller->check_session();
    $controller->printHTML();
    
?>
