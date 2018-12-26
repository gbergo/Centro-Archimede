<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_private.php';
    require_once __DIR__.'/../../class/query/log.php';
    require_once __DIR__.'/../../class/pagine/menu/menu.php';
    require_once __DIR__.'/../../class/pagine/menu/staticMenu.php';


    $controller = new controller();
    $controller->setPage(new page_private('Generale','content_general_admin',(new menu((new staticPath())->admin(0))),'general_admin'));
    $controller->check_session();
    $controller->printHTML();
?>                    