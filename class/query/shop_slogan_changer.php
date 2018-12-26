<?php
require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';
require_once __DIR__.'/../utility/regex.php';

class shop_slogan extends connection implements query{
    private $user;
    private $newSlogan;
    private $newDescription;
    private $regex;


    public function __construct($shopSlogan=NULL, $shopDescription=NULL){
        $this->user=parent::escaped_string($_SESSION['user']);
        $this->newSlogan=parent::escaped_string($shopSlogan);
        $this->newDescription=parent::escaped_string($shopDescription);

        $this->newSlogan =htmlentities($this->newSlogan);
        $this->newDescription =htmlentities($this->newDescription);

        $this->regex=regex::emptyString();
    }

    public function validator(){
        if(preg_match($this->regex,$this->newSlogan)){
            throw new exeption('error', 'non si può inserire una motto vuoto.');
        }
        if(preg_match($this->regex,$this->newDescription)){
            throw new exeption('error', 'non si può inserire una descrizione vuoto.');
        }
        if(strlen($this->newSlogan) > 64){
            throw new exeption('error','il motto inserito deve essere di lunghezza minore di 64 caratteri');
        }
        if(strlen($this->newDescription) > 256){
            throw new exeption('error','la descrizione inserita deve essere di lunghezza minore di 256 caratteri');
        }
    }

    public function update(){
        $this->validator();
        $query="UPDATE info SET motto='$this->newSlogan', descrizione='$this->newDescription'  WHERE username='$this->user';";
        if(parent::execute_query($query) == NULL){
            throw new exeption('error', 'modifica non eseguita');
        }
    }

    public function read(){
        $query="SELECT motto, descrizione FROM info WHERE username='$this->user'";
        return mysqli_fetch_array(parent::execute_query($query));
    }

    public function write(){}
}

?>