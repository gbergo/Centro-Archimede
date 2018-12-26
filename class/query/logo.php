<?php 

require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../interfacce/query.php';
require_once __DIR__.'/image.php';


class logo extends image{
        private $user;
        private $name;
        private $size;
        private $tmp_name;
        private $error;
        private $destination;
        private $extention;
        private $directory;
        //costruttore della classe inputPicture

        public function __construct($user){
            $this->directory ='../../mainPage/HTML/images/logo/';
            parent::__construct('logo');
            $this->user =$user;
            if(isset($_FILES['immagine'])){
                $this->name =parent::escaped_string($_FILES["immagine"]["name"]);
                $this->tmp_name =parent::escaped_string($_FILES["immagine"]["tmp_name"]);
            }
        }
        public function write(){
            parent::resize_and_store();
            $this->delete();
            $this->update();
        }
        public function read(){
            $logo ="SELECT * FROM logo L WHERE L.username = '$this->user'";
            return parent::execute_query($logo);
        }
        public function delete(){
            $query="SELECT logo FROM logo WHERE username = '$this->user'";
            $file_to_delete=(parent::execute_query($query))->fetch_array(MYSQLI_ASSOC);
            if($file_to_delete['logo']!='working_progress.jpg'){
                unlink($this->directory.$file_to_delete['logo']);
            }
        }
        public function update(){
            $rename=sha1($this->name).'.'.pathinfo($this->name, PATHINFO_EXTENSION);
            $query="UPDATE logo SET logo ='$rename', alt ='logo negozio' WHERE username = '$this->user'";
            if(parent::execute_query($query) == NULL){
                throw new exeption('error','upload fallito, si posso caricare solo immagini.');
            }
            rename($this->directory.$this->name,$this->directory.$rename);  
        }
        
    }
    
?>