<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_private.php';
    require_once __DIR__.'/../../class/query/image.php';
    require_once __DIR__.'/../../class/pagine/menu/menu.php';
    require_once __DIR__.'/../../class/pagine/menu/staticMenu.php';
    require_once __DIR__.'/../../class/utility/EmptyBarGray.php';

    $controller = new controller();
    $controller->setPage(new page_private('Promozioni','content_promozioni_private',(new menu((new staticPath())->user('1'))), 'promozioni_private'));
    $controller->check_session();
    $controller->printHTML();
?>
