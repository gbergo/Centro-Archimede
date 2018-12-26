<?php

class exeption extends Exception{
    private $flag;
    private $text_flag;

    public function __construct($fl=NULL,$t_fl=NULL){
        $this->flag =$fl;
        $this->text_flag =$t_fl;
    }
    public function getFlag(){
        return $this->flag;
    }
    public function getText_flag(){
        return $this->text_flag;
    }
}

?>