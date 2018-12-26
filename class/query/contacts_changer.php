<?php
require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';
require_once __DIR__.'/../utility/regex.php';


class infos_changer extends connection implements query{
    private $user;
    private $phoneNumber;
    private $emailAddress;
    private $webLink;

    private $telephonRegex;
    private $emailRegex;
    private $websiteRegex;


    public function __construct($phone=NULL, $email=NULL, $website=NULL){
        $this->user=parent::escaped_string($_SESSION['user']);
        $this->phoneNumber=parent::escaped_string($phone);
        $this->emailAddress=parent::escaped_string($email);
        $this->webLink=parent::escaped_string($website);
    
        $this->telephoneRegex=regex::telephone();
        $this->emailRegex = regex::email();
        $this->websiteRegex= regex::sitoweb();

    }
    public function validate(){
        if(!preg_match($this->telephoneRegex,$this->phoneNumber)){
            throw new exeption('error','il numero di telefono inserito non è valido');
        }

        if(!preg_match($this->emailRegex,$this->emailAddress)){
            throw new exeption('error','la mail inserita non è valida');
        }
        if(!preg_match($this->websiteRegex,$this->webLink)){
            throw new exeption('error','il sito inserito non è valido');
        }
        if(strlen($this->phoneNumber) > 13){
            throw new exeption('error','il numero di telefono inserito deve essere di lunghezza minore di 13 caratteri');
        }
        if(strlen($this->emailAddress) > 64){
            throw new exeption('error','la mail inserita deve essere di lunghezza minore di 64 caratteri');

        }
        if(strlen($this->webLink) > 96){
            throw new exeption('error','il link inserito deve essere di lunghezza minore di 96 caratteri');
        }
    }


    public function update(){
        $this->validate();
        $query="UPDATE info SET telefono='$this->phoneNumber', mail='$this->emailAddress', sito='$this->webLink' WHERE username='$this->user';";
        if(parent::execute_query($query) == NULL){
            throw new exeption('error', 'modifica non eseguita');
        }
    }

    public function read(){
        $query = "SELECT A.telefono, A.mail, A.sito FROM info A WHERE A.username = '$this->user'";
        return mysqli_fetch_array(parent::execute_query($query));
    }

    public function write(){}
}

?>