<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_promozione.php';
    require_once __DIR__.'/../../class/query/image.php';
    require_once __DIR__.'/../../class/pagine/menu/menu.php';
    require_once __DIR__.'/../../class/pagine/menu/staticMenu.php';
    require_once __DIR__.'/../../class/utility/EmptyBarGray.php';


    $controller = new controller();
    $controller->setPage(new page_promozione());
    $controller->printHTML();
?>
