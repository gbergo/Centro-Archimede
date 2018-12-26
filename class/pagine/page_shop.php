<?php 

    require_once __DIR__.'/../interfacce/type_page.php';
    require_once __DIR__.'/../query/shop.php';
    require_once __DIR__.'/page_public.php';
    require_once __DIR__.'/menu/menu.php';
    require_once __DIR__.'/menu/staticMenu.php';


    class page_shop extends page_public{
        private $name;
        private $shop;
        private $content;
        public function __construct(){
            $this->name='negozio';
            $this->content='all_shop';

            if(isset($_GET['shop'])){
                $this->content='alone_shop';
                $this->shop =': '.$_GET['shop'];
            }
            if(isset($_GET['prod'])){
                $this->content='alone_prod';
                $this->shop =': '.$_GET['prod'];
            }
            page_public::__construct($this->name,(new menu((new staticPath())->public_menu('1'))),$this->content);
        }
        
        public function breadcrumb(){
            echo '	<div id="breadcrumb">
                        <h2>'.$this->name.$this->shop.'</h2>
                    </div>';
        }
    }

?>
