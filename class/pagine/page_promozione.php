<?php 

    require_once __DIR__.'/../interfacce/type_page.php';
    require_once __DIR__.'/../query/shop.php';
    require_once __DIR__.'/page_public.php';
    require_once __DIR__.'/menu/menu.php';
    require_once __DIR__.'/menu/staticMenu.php';


    class page_promozione extends page_public{
        private $name;
        private $promo;
        private $content;
        private $titolo;

        public function __construct(){
            $this->name='promozione';
            $this->content='all_promo';
            
            if(isset($_GET['promo'])){
                $this->content='alone_promo';
                $this->promo =': '.$_GET['promo'];
            }
            page_public::__construct($this->name,new menu((new staticPath())->public_menu('4')),$this->content);
        }
        
        public function breadcrumb(){
            echo '	<div id="breadcrumb">
                        <h2>'.$this->name.$this->promo.'</h2>
                    </div>';
        }
    }

?>