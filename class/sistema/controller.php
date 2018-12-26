<?php

require_once __DIR__.'/exeption.php';
require_once __DIR__.'/../interfacce/type_page.php';
require_once __DIR__.'/../pagine/page_private.php';
require_once __DIR__.'/session_manager.php';

class controller{
	private $page;
    protected $managerS;
    //metodi
    function __construct(){
    	$this->managerS =new session_manager();
    }
    public function setPage(type_page $type_page){
        $this->page =$type_page;
    }

    public function check_session(){
    	$this->managerS->check_session();
    }

    public function logout(){
        $this->managerS->logout();
        $this->managerS->set_flag(new exeption("correct","Logout avvenuto con successo."));
    }
    
    public function printHTML(){
        try{
            $this->page->head();
            $this->managerS->set_flag(new exeption());
        }
        catch(exeption $ex){
            $this->managerS->set_flag($ex);
        }
    }
}

?>
