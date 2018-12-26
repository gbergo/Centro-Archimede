<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_shop.php';


    $controller = new controller();
    $controller->setPage(new page_shop());
    $controller->printHTML();

?>
