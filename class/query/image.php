<?php 

require_once __DIR__.'/../sistema/exeption.php';
require_once __DIR__.'/../sistema/connection.php';
require_once __DIR__.'/../interfacce/query.php';
require_once __DIR__.'/ImageManipulator.php';
require_once __DIR__.'/../utility/regex.php';


class image extends connection implements query{
        private $user;

        private $name_image;
        private $alt;
        private $start =NULL;
        private $finish =NULL;
        private $description;

        private $name;
        private $size;
        private $imageHeight;
        private $imageWidth;
        private $tmp_name;
        private $error;
        private $destination;
        private $extention;
        private $directory;
        private $type;

        private $regex; 
        private $emptyString; 
        
        private $phpFileUploadErrors;
        //costruttore della classe inputPicture

        public function __construct($type=NULL, $user = NULL){
            $this->user =$user;

            $this->type =$type;
            $this->directory ='../../mainPage/HTML/images/'.$this->type.'/';
            $this->extention= ['jpg','jpeg','gif','png'];
            $this->regex=regex::date();
            $this->emptyString=regex::emptyString();
            $this->phpFileUploadErrors = array(
                0 => 'Nessun errore',
                1 => 'dimensione maggiore della massima dimensione consentita',
                2 => 'dimensione maggiore della massima dimensione consentita',
                3 => 'immagine solo parzialmente caricata',
                4 => 'non è presente alcuna immagine da caricare',
                6 => 'Missing a temporary folder',
                7 => 'Failed to write file to disk.',
                8 => 'A PHP extension stopped the file upload.',
            );
        }
        public function take_data(){
            if($_POST){
                $this->name_image =parent::escaped_string($_POST['nome']); 
                $this->alt =parent::escaped_string($_POST['campo_alt']);
                if($this->type =='promozione'){
                    $this->start =parent::escaped_string($_POST['start']);
                    $this->finish =parent::escaped_string($_POST['finish']);
                }
                $this->description =parent::escaped_string($_POST['descrizione']);
            }
            if($_FILES){
                $this->name =parent::escaped_string($_FILES["immagine"]["name"]);
                $this->size =parent::escaped_string($_FILES["immagine"]["size"]);
                $this->error =parent::escaped_string($_FILES["immagine"]["error"]);
                $this->user =parent::escaped_string($_SESSION['user']);
                $this->name =parent::escaped_string($_FILES["immagine"]["name"]);
                $this->tmp_name =parent::escaped_string($_FILES["immagine"]["tmp_name"]);
            }
        }
        public function checker(){
            if($this->type != 'logo' && preg_match($this->emptyString,$this->name_image)){
                throw new exeption('error', 'non si può inserire un/una '.$this->type.' senza nome.');
            }
            if($this->type != 'logo' && preg_match($this->emptyString,$this->alt)){
                throw new exeption('error', 'non si può inserire un/una '.$this->type.' senza alternativa testuale.');
            }
            if($this->type != 'logo' && preg_match($this->emptyString,$this->description)){
                throw new exeption('error', 'non si può inserire un/una '.$this->type.' senza descrizione.');
            }
            if($this->type != 'logo' && preg_match($this->emptyString,$this->name_image)){
                throw new exeption('error', 'non si può inserire un/una '.$this->type.' senza nome.');
            }
            if(strlen($this->name_image) > 64){
                throw new exeption('error','il nome inserito deve essere di lunghezza minore di 64 caratteri');
            }
            if(strlen($this->alt) > 64){
                throw new exeption('error','alt inserito deve essere di lunghezza minore di 64 caratteri');
            }
            if(strlen($this->description) > 256){
                throw new exeption('error','la descrizione inserito deve essere di lunghezza minore di 256 caratteri');

            }
            if($this->type=='promozione'){
                preg_match($this->regex, $this->start, $okstart, PREG_OFFSET_CAPTURE); 
                if(empty($okstart)){throw new exeption('error','data non in formato GG-MM-AAAA o non calendarizzato');} 
                preg_match($this->regex, $this->finish, $okfinish, PREG_OFFSET_CAPTURE); 
                if(empty($okfinish)){throw new exeption('error','data non in formato GG-MM-AAAA o non calendarizzato');} 
                $startdate=str_replace("-", "", $this->start); 
                $enddate=str_replace("-", "", $this->finish); 
                $arraystart=str_split($startdate, 2); 
                $arrayend=str_split($enddate, 2); 
                
                if(($arraystart[3]>=$arrayend[3]) && ($arraystart[2]>=$arrayend[2])){ 
                    if($arraystart[1]>=$arrayend[1]){ 
                        if($arraystart[0]>$arrayend[0]){throw new exeption('error','Data di fine precedente a quella di inizio');} 
                    } 
                } 
            } 
            if($this->error != '0'){throw new exeption('error',$this->phpFileUploadErrors[$this->error]);}
            //controllo se l'immagine non ha dimensione 0                
            if($this->size == false || $this->name == NULL){throw new exeption('error','size nulla.');}
            /*controllo che l'immagine inserita non sia troppo
            * grande per essere inserita nel sito
            */
            if($this->size >= 10000000){throw new exeption('error','immagine troppo grande.');}
            /*controllo che il formato dell'immagine inserito
            * sia accettato dal sito
            */


            $sent =false;
            foreach($this->extention as $formato){
                if(pathinfo($this->name, PATHINFO_EXTENSION) == $formato){
                    $sent=true;
                }
            }
            if(!$sent){throw new exeption('error','upload fallito, si posso caricare solo immagini.');}
        }

        public function read($titolo=NULL){
            $query="SELECT * FROM immagini WHERE username = '$this->user' AND type = '$this->type'";
            $string_query_titolo=NULL;
            if($titolo != NULL){
                $string_query_titolo="AND Img.titolo = '$titolo'";
            }
            if($this->user == NULL){
                    $query="SELECT Img.username, Img.type, Img.source, Img.titolo, Img.alt, Img.start, Img.finish, Img.descrizione, I.negozio
                    FROM immagini Img JOIN info I ON (Img.username = I.username) 
                    WHERE type = '$this->type'$string_query_titolo ORDER BY Img.data_inserimento DESC
                ";
            }
            return parent::execute_query($query);
        }

        public function how_much(){
            $result =$this->read();
            if(mysqli_num_rows($result) == '3'){
                throw new exeption('error','inserimento '.$this->type.' fallito, eliminane uno per inserirne uno nuovo.');
            }
        }

        public function write(){
            $this->how_much();
            $this->resize_and_store();
            $this->insert();
        }

        public function delete(){
            $delete =parent::escaped_string($_POST['titolo']);
            $query_to_delete="SELECT source FROM immagini WHERE username = '$this->user' AND type = '$this->type' AND titolo = '$delete'";
            $file_to_delete=mysqli_fetch_array(parent::execute_query($query_to_delete));
            $query="DELETE FROM immagini WHERE type = '$this->type' AND titolo = '$delete'";
            if(parent::execute_query($query)){
                if(!unlink($this->directory.$file_to_delete['source'])){
                    throw new exeption('error','upload fallito, riprovare più tardi.');
                }
            }
        }
        
        public function insert(){
            $date=date("Y/m/d");
            $rename=sha1($this->name.$this->user).'.'.pathinfo($this->name, PATHINFO_EXTENSION);
            $insert_immagine="INSERT INTO immagini VALUES ('$this->user','$this->type','NULL','$rename','$this->name_image','$this->alt','$this->start','$this->finish','$this->description','$date')";
            if(parent::execute_query($insert_immagine) == NULL){
                unlink($this->directory.$this->name);
                throw new exeption('error','upload fallito, riprovare più tardi.');
            }
            else{
                rename($this->directory.$this->name,$this->directory.$rename);
            }
        }

        public function resize_and_store(){
            $this->checker();
            $manipulator = new ImageManipulator($this->tmp_name);
            $width  = $manipulator->getWidth();
            $height = $manipulator->getHeight();

            $size = min($width, $height);
            $size = $size/2;
            
            $centreX = round($width / 2);
            $centreY = round($height / 2);
            // our dimensions will be define a square

            $x1 = $centreX - $size;
            $y1 = $centreY - $size;
     
            $x2 = $centreX + $size;
            $y2 = $centreY + $size;

            // center cropping to 200x130
            $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
            // saving file to uploads folder
            $manipulator->save($this->directory.$this->name);
        }
        
        public function search($titolo){
            $query="SELECT * FROM immagini WHERE titolo = '$titolo'";
            return parent::execute_query($query);
        }

        public function delete_image_of_user($user){
            $rows=array();
            $query="SELECT source FROM immagini WHERE username = '$user'";
            $result_image=parent::execute_query($query);
            while($row = $result_image->fetch_array(MYSQLI_ASSOC)){
                $rows[] = $row;
            }
            $promozioni ='../../mainPage/HTML/images/promozione/';
            $prodotti ='../../mainPage/HTML/images/prodotto/';

            foreach($rows as $row){
                unlink($promozioni.$row['source']);
                unlink($prodotti.$row['source']);
            }
        }

    }
    
?>
