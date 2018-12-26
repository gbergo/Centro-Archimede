<?php
require_once __DIR__.'/exeption.php';

class connection{
    //campi privati
    private static $host = "localhost";
    private static $db_user = "darossi";
    private static $db_psw = "buiTer9unge9hohy";
    private static $db_name = "darossi";

    //metodi
    public function connect(){
        return new mysqli(connection::$host,connection::$db_user,connection::$db_psw,connection::$db_name);
    }
    public function escaped_string($string){
        $sql=$this->connect();
        $escaped_string =($this->connect())->real_escape_string($string);
        $sql->close();
        return $escaped_string;
    }
    public function execute_query($query){
        $sql=$this->connect();
        $result =$sql->query($query);
        $sql->close();
        return $result;
    }
}

?>
