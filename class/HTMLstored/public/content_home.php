
      <div id="corpo">
		    <img id="imgTorre" src="images/default/torre 2.jpg" alt="immagine torre archimede" />
		    <h2>Benvenuti nel Centro Commerciale Archimede</h2>

		    <div id="contentRight">
    
                <h3>ORARI</h3>
                <?php
                    $orario =new orario('admin');
                    $giorni = array();
                    $giorni =$orario->getGiorniHTML();
                    $result_orario =$orario->read()->fetch_array(MYSQLI_NUM);
                    
                    for($i =0; $i < 7 ; $i ++){
                        echo '<p><strong>'.$giorni[$i].' :</strong> '.$result_orario[$i].'</p>';
                    }
                ?>            
				<h3>Aperture Straordinarie</h3>
                    <?php
                        $news =new news('APERTURA');
                        $news->delete_periodic();
                        $aperture =$news->read();
                        $rows =array();
                        while($row = $aperture->fetch_array(MYSQLI_ASSOC)){
                            $rows[] = $row;
                        }
                        if(!count($rows)){
                            EmptyBarGray('nessuna apertura');
                        }
                        else{
                            echo '<ul>';
                            foreach($rows as $row){
                                echo '<li>Aperti in data: '.date("d-m-Y", strtotime($row['data'])).'</li>';
                            }
                            echo '</ul>';
                        }
                    ?>    
			     
         
             <h3>Chiusure Straordinarie</h3>
                <?php
                    $chiusure =$news->read('CHIUSURA');
                    $rows =array();
                    while($row = $chiusure->fetch_array(MYSQLI_ASSOC)){
                        $rows[] = $row;
                    }
                    if(!count($rows)){
                        EmptyBarGray('nessuna chiusura');
                    }
                    else{
                        echo '<ul>';
                        foreach($rows as $row){
                           echo '<li>Chiusi in data: '.date("d-m-Y", strtotime($row['data'])).'</li>';
                        }
                        echo '</ul>';
                    }
                ?>                     
        
                <h3>Novità</h3>
                    <?php
                        $novita =$news->read('NOVITA');
                        $rows =array();
                        while($row = $novita->fetch_array(MYSQLI_ASSOC)){
                            $rows[] = $row;
                        }
                        if(!count($rows)){
                            EmptyBarGray('nessuna novit&agrave;');
                        }
                        else{
                            echo '<ul>';
                            foreach($rows as $row){
                                echo '<li>'.$row['descrizione'].'. Data: '.date("d-m-Y", strtotime($row['data'])).'</li>';
                            }
                            echo '</ul>';
                        }
                    ?>                   		  
      
            <div id="area_amministrazione">
                <a href="login.php">
                 <img src="images/default/profilo.jpg" alt="immagine area amministratore"/>
                 AREA AMMINISTRAZIONE
                </a>
            </div>
          </div>

		    <div id="contentLeft">

<ul id="casella">
    <li><a href="negozio.php">Negozi</a></li>
    <li><a href="dove_siamo.php">Dove Siamo</a></li>
    <li><a href="contatti.php">Contatti</a></li>
</ul>
<h2 >Promozioni</h2>

    <?php
        $promozione = new image('promozione');
        $result_promozione =$promozione->read();
    
        $rows =array();
        $index=0;
        while($row = $result_promozione->fetch_array(MYSQLI_ASSOC)){
            if($index<6){
                $rows[] = $row;
                $index=$index+1;
            }
        }

        if(!count($rows)){
            EmptyBarGray('prossimamente');
        }
        else{
            echo '<ul id="promozione">';
            foreach($rows as $row){
                echo '
                <li>
                    <a href="promozione.php?promo='.$row['titolo'].'">
                        <img src="images/promozione/'.$row['source'].'" alt="'.$row['alt'].'"/>
                    '.$row['negozio'].'
                    </a> 
                </li>';
            }
            echo '  </ul>';
        }
?>
</div>
</div>
