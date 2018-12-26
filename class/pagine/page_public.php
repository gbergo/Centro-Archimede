<?php 
require_once __DIR__.'/../interfacce/type_page.php';


class page_public implements type_page{
	private static $style="style.css";
	private $menu;
	private $name;
	private $name_file_content;
	private $lang;

	public function __construct($name, menu $menu,$nc,$lg =NULL){
		$this->name =$name;
		$this->menu =$menu;
		$this->lang =NULL;
		if($lg != NULL){
			$this->lang ='xml:lang="'.$lg.'"';
		}
		$this->name_file_content=$nc;
	}
	public function intestazione(){
		$file = file_get_contents('../../class/HTMLstored/public/preambolo.html', FILE_USE_INCLUDE_PATH);
		$file = str_replace('__NAME_PAGE__',$this->name,$file);
		$file = str_replace('__STYLE__',page_public::$style,$file);

		echo $file;
    }
    public function header(){
        $file = file_get_contents('../../class/HTMLstored/public/header.html', FILE_USE_INCLUDE_PATH);
        echo $file;
	}
	public function menu(){
		$skip ='<p><a xml:lang="en" href="#content" class="accesaid">Skip navigation</a></p>';
		$str ='<div id="menu">
			'.$skip.$this->menu->print().'</div>';
		echo $str;
	}		
    public function breadcrumb(){
    	echo '	<div id="breadcrumb">
        			<h2 '.$this->lang.'>'.$this->name.'</h2>
    			</div>';
	}
	public function content(){
		echo '<div id="content">';
		require_once __DIR__.'/../HTMLstored/public/'.$this->name_file_content.'.php';	
		echo '</div>';
	}

    public function footer(){
		require_once __DIR__.'/../HTMLstored/public/footer.php';	
    }
    public function body(){
		$this->header();
		$this->menu();
		$this->breadcrumb();
		$this->content();
		$this->footer();
    }
	public function head(){
		$this->intestazione();
		$this->body();
	}
}
?>
