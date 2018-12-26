<div id="colonna_sinistra">
<div id="nuova_promozione"></div> 
  <form action="../mainForm/insertPromozione.php" method="post" enctype="multipart/form-data" onsubmit="return checkPromo()">
    <div>
      <fieldset>
          <legend class="intestazione">Nuova promozione</legend>

          <label for="nome_prodotto">Nome:</label>
          <input type="text" name="nome" id="nome_prodotto" />

          <label for="campo_alt">Alternativa testuale dell'immagine della promozione:</label>
          <input type="text" name="campo_alt" id="campo_alt"/>

          <label for="data">Data Inizio :</label> 
          <input type="text" name="start" id="data"  />

          <label for="data_fine">Data Fine :</label>
          <input type="text" name="finish" id="data_fine"  /> 


          <label for="descrizione_prodotto">Descrizione promozione:</label>
          <textarea name="descrizione" id="descrizione_prodotto" rows="10" cols="30"></textarea>
          
          <label for="immagine">Seleziona la promozione da inserire:</label>
          <input type="file" name="immagine" id="immagine"/>
          <div class="invia">
            <input  type="submit" value="Salva"/>
          </div>
      </fieldset>
    </div>
  </form>
</div>
            
<div id="colonna_destra">
    <p class="intestazione">Promozioni Correnti</p>
    <?php 
                    $promozioni =new image('promozione',$_SESSION['user']);
                    $result_pro =$promozioni->read();
                    $rows =array();
                    while($row = $result_pro->fetch_array(MYSQLI_ASSOC)){
                      $rows[] = $row;
                    }
                    if(!count($rows)){
                      EmptyBarGray('non sono presenti promozioni');
                    }
                    else{
                      foreach($rows as $row){
                            echo '<div class="contenuto_corrente">
                            <a href="promozione.php?promo='.$row['titolo'].'">
                          <img src="images/promozione/'.$row['source'].'" alt="'.$row['alt'].'"/>
                          '.$row['titolo'].' 
                          </a>
                          </div>';
                      }
                    }
                  ?> 
</div> 

<div id="colonna_destra_sotto">
<div id="deletePromo"></div> 
              <form  action="../mainForm/deletePromozione.php" method="post" onsubmit="return validatePromo()">
                <div>
                  <fieldset>
                  <legend class="intestazione">Elimina Promozioni</legend>

                  <label for="elimina_prodotto">Nome Promozione:</label>
                  <select name="titolo" id="elimina_prodotto">
                     <option value="Cerca nel menu:">Cerca nel menu:</option>
                     <?php 
                      foreach($rows as $row){
                      echo '<option value="'.$row['titolo'].'">'.$row['titolo'].'</option>';
                    }
                  ?>
                  </select>  
                  <div class="invia">                
                   <input type="reset"  name="tasto_reset"  value="Reset"/>  
                   <input type="submit" name="tasto_salva"  value="Salva"/>
                  </div>
                  </fieldset>
                </div>
               </form>
            </div>