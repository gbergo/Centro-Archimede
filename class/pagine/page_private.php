<?php 
require_once __DIR__.'/../interfacce/type_page.php';

class page_private implements type_page{
	private static $style="private_style.css";
	private $menu;
	private $name;
	private $javascript;
	private $name_file_content;
	private $lang;
	private $spanClosure;
	private $user;
	

	public function __construct($name,$nc, menu $menu=NULL,$js =NULL,$lg =NULL){
		$this->name =$name;
		$this->menu =$menu;
		$this->javascript =$js;
		$this->name_file_content=$nc;
		$this->spanClosure=NULL;
		$this->lang=NULL;
		if($lg != NULL){
			$this->lang ='<span xml:lang="'.$lg.'">';
			$this->spanClosure='</span>';
		}

		$this->user=NULL;
		if(isset($_SESSION['user'])){
			$this->user=$_SESSION['user'];
		}
	}
	
	public function intestazione(){
		$file = file_get_contents('../../class/HTMLstored/private/preambolo.html', FILE_USE_INCLUDE_PATH);
		$file = str_replace('__USER__',$this->user,$file);
		$file = str_replace('__NAME_PAGE__',$this->name,$file);
		$file = str_replace('__STYLE__',page_private::$style,$file);
		$js =NULL;
		if($this->javascript != NULL){
			$js ='<script type="text/javascript" src="../Javascript/'.$this->javascript.'.js"></script>';
		}
		$file =str_replace('__JAVASCRIPT__',$js,$file);
		echo $file;
    }
    public function header(){
		$file = file_get_contents('../../class/HTMLstored/private/header.php', FILE_USE_INCLUDE_PATH);
        echo $file;
	}

	public function menu(){
		$str ='<div id="menu">'.$this->menu->print().'</div>';
		$str =str_replace('__USER_NAME__',$_SESSION['user'],$str);
		echo $str;
	}		

    public function breadcrumb(){
		$str= '	<div id="breadcrumb"><h2>';
    	if($_SESSION['user'] != NULL){
    		$str =$str.$_SESSION['user'].': '.$this->lang.$this->name.$this->spanClosure;
    	}
    	else{
    		$str =$str.$this->lg.$this->name.$this->spanClosure;
		}

    	echo $str.'</h2></div>';
    }
    public function print_bar(){
        if($_SESSION['flag'] != NULL){
            echo '<h2 id="'.$_SESSION['flag'].'">'.$_SESSION['flag_text'].'</h2>';
        }
    }
	
	public function content(){
		echo '<div id="content">';
		require_once __DIR__.'/../HTMLstored/private/'.$this->name_file_content.'.php';	
		echo '</div>';
	}

    public function footer(){
		require_once __DIR__.'/../HTMLstored/private/footer.php';	
	}

    public function body(){
		$this->header();
		$this->menu();
    	$this->breadcrumb();
		$this->print_bar();
		$this->content();
		$this->footer();
    }
	public function head(){
		$this->intestazione();
		$this->body();
	}
}
?>
