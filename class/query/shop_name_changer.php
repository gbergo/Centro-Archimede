<?php
require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';
require_once __DIR__.'/../utility/regex.php';

class name_change extends connection implements query{
    private $user;
    private $newName;
    private $regex;

    public function __construct($shopName=NULL){
        $this->user=parent::escaped_string($_SESSION['user']);
        $this->newName=parent::escaped_string($shopName);
        $this->regex=regex::emptyString();
    }

    public function validator(){
        if(preg_match($this->regex,$this->newName)){
            throw new exeption('error', 'non si può inserire un negozio con nome vuoto.');
        }
        if(strlen($this->newName) > 64){
            throw new exeption('error','il nome inserito deve essere di lunghezza minore di 64 caratteri');
        }
    }

    public function update(){
        $this->validator();
        $query="UPDATE info SET negozio='$this->newName' WHERE username='$this->user';";
        if(parent::execute_query($query) == NULL){
            throw new exeption('error', 'modifica non eseguita');
        }
    }
    

    public function read(){
        $query = "SELECT A.negozio FROM info A WHERE A.username = '$this->user'";
        return mysqli_fetch_array(parent::execute_query($query));
    }

    public function write(){}
}

?>