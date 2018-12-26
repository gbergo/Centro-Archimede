<?php

class schedaMenu{
    private $name;
    private $link;
    private $active =NULL;
    private $lang =NULL;

    public function __construct($nm,$lk,$lg=NULL){
        $this->name =$nm;
        $this->link =$lk;
        $this->lang=$lg;
    }
    public function printScheda(){
        $str ='<li '.$this->lang().'><a '.$this->active.' href="'.$this->link.'">'.$this->name.'</a></li>';
        return $str;
    }
    public function activation(){
    	$this->active ='class ="active"';
    }
    public function lang(){
        if($this->lang != NULL){
            return 'xml:lang="'.$this->lang.'"';
        }
    }

}

?>
