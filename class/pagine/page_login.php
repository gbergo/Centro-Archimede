<?php 

    require_once __DIR__.'/../interfacce/type_page.php';
    require_once __DIR__.'/../query/shop.php';
    require_once __DIR__.'/page_public.php';
    require_once __DIR__.'/menu/menu.php';
    require_once __DIR__.'/menu/staticMenu.php';


    class page_login extends page_private{
        private $name;
        private $content;

        public function __construct($cn){
            $this->name='login';
            $this->content=$cn;
            page_private::__construct($this->name,$this->content);
        }
        
        public function breadcrumb(){
            echo '	<div id="breadcrumb">
                        <h2><span xml:lang="en">'.$this->name.'</span></h2>
                    </div>';
        }

        public function menu(){}
        
        public function header(){
		    $file = file_get_contents('../../class/HTMLstored/private/header_login.php', FILE_USE_INCLUDE_PATH);
            echo $file;
        }
    }

?>
