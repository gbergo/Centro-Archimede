<?php 
require_once __DIR__.'/page_negozi.php';
require_once __DIR__.'/../query/image.php';
require_once __DIR__.'/../query/lang.php';


class prodpromo_public extends negozi{
	private $titolo;
	private $result;

	public function __construct(){
		negozi::__construct();
		if(isset($_GET['titolo'])){
			$this->titolo =$_GET['titolo'];
			$image = new image();
			$this->result = $image->search($this->titolo)->fetch_array(MYSQLI_ASSOC);
		}
		if($this->result == NULL){
			unset($_GET['titolo']);
			header('location: negozio.php');
			die;
		}
	}

    public function breadcrumb(){
    	echo '	<div id="breadcrumb">
        			<h2><strong>negozio</strong>: '.$this->result['username'].' : '.$this->result['titolo'].'</h2>
    			</div>';
	}
	
	public function content(){

		$lang=getTextLanguage($this->result['descrizione'],'it');
        $start=NULL;
        $end=NULL;
        if($lang != 'it'){
            $start='<span xml:lang="'.$lang.'">';
            $end='</span>';
        }

		echo '
		<div id="content">
			<div id="content_prodpromo">
				<h3 id="intestazione">
				<a href="negozio.php?shop='.$this->result['username'].'">'.$this->result['username'].'</a>: '.$this->result['titolo'].'</h3>
				<div id="prodpromo_leftSide">
					<img id="img_prodpromo" src="images/'.$this->result['type'].'/'.$this->result['source'].'" alt="'.$this->result['alt'].'"/>
				</div>
				<div id="prodpromo_rightSide">
					<p id="descrizione_prodpromo">'.$start.$this->result['descrizione'].$end.'</p>
					<p id="date_inizio_fine">Inizio: '.$this->result['start'].' <br> Fine: '.$this->result['finish'].'</p>
				</div>
			</div>
		</div>';
	}
}
?>
