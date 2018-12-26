<?php 

require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';

class permission extends connection implements query{
    //campi privati
    private $user;
    private $type_user;
    private $page;
    private $key;

    //metodi
    public function __construct(){
        $this->user =$_SESSION['user'];
        $this->type_user =$_SESSION['type'];
        $this->page =preg_replace('/\\.[^.\\s]{3,4}$/', '', basename($_SERVER['PHP_SELF']));
        if($this->page == 'login' && $_SESSION['link'] != NULL){
            $this->page=$_SESSION['link'];
        }
        if(isset($_SESSION['key'])){
            $this->key=$_SESSION['key'];
        }
    }
    public function getPage(){
        return $this->page;
    }

    public function write(){
        $this->delete();
        $query = "INSERT INTO onlineUser(account,temporaryKey) VALUES ('$this->user','$this->key')";
        return parent::execute_query($query);
    }

    public function read(){
        $query = "SELECT T.link FROM type_account T JOIN account A JOIN onlineUser O ON (A.username = O.account)  
        WHERE T.user_type = '$this->type_user' AND T.link = '$this->page' AND A.username = '$this->user' AND O.temporaryKey = '$this->key'";
        $permission=NULL;
        $permission =parent::execute_query($query);
        if(mysqli_num_rows($permission) != 0){
            $this->update();
        }
        return mysqli_num_rows($permission);
    }
    public function read_query(){
        $query = "SELECT A.username FROM account A JOIN onlineUser O ON (A.username = O.account)
        WHERE A.username = '$this->user' AND O.temporaryKey = '$this->key'";
        $permission=NULL;
        $permission =parent::execute_query($query);
        if(mysqli_num_rows($permission) == 0){
            throw new exeption("error","Non è possibile eseguire questa operazione");
        }
        else{
            $this->update();
        }
    }

    public function delete(){
        $query="DELETE FROM onlineUser WHERE account = '$this->user'";
        return parent::execute_query($query);
    }

    public function update(){
        $query="UPDATE onlineUser SET data =now() WHERE account = '$this->user'";
        parent::execute_query($query);
    }
}

?>