<?php
    require_once __DIR__.'/../../class/sistema/controller.php';
    require_once __DIR__.'/../../class/pagine/page_private.php';
    require_once __DIR__.'/../../class/query/contacts_changer.php';
    require_once __DIR__.'/../../class/query/shop_name_changer.php';
    require_once __DIR__.'/../../class/query/shop_slogan_changer.php';
    require_once __DIR__.'/../../class/query/orario.php';
    require_once __DIR__.'/../../class/query/log.php';
    require_once __DIR__.'/../../class/pagine/menu/menu.php';
    require_once __DIR__.'/../../class/pagine/menu/staticMenu.php';
    require_once __DIR__.'/../../class/utility/lang.php';


    $controller = new controller();
    $controller->setPage(new page_private('Generale','content_general_private',(new menu((new staticPath())->user('0'))), 'general_private'));
    $controller->check_session();
    $controller->printHTML();
    
?>
