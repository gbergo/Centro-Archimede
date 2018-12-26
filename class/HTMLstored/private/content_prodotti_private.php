<div id="colonna_sinistra">
  <div id="newProduct"></div>
  <form action="../mainForm/insertProdotto.php" method="post" enctype="multipart/form-data" onsubmit="return checkProd()">
    <div>
      <fieldset>
          <legend class="intestazione">Nuovo prodotto</legend>

          <label for="nome_prodotto">Nome:</label>
          <input type="text" name="nome" id="nome_prodotto" />

          <label for="campo_alt">Alternativa testuale dell'immagine del prodotto:</label>
          <input type="text" name="campo_alt" id="campo_alt"/>

          <label for="descrizione_prodotto">Descrizione prodotto:</label>
          <textarea name="descrizione" id="descrizione_prodotto" rows="10" cols="30"></textarea>
          
          <label for="immagine">Seleziona il prodotto da inserire:</label>
          <input type="file" name="immagine" id="immagine"/>
          <div class="invia">
            <input  type="submit" value="Salva"/>
          </div>
      </fieldset>
    </div>
  </form>
</div>
            
<div id="colonna_destra">
    <p class="intestazione">Prodotti Correnti</p>
    <?php 
                    $promozioni =new image('prodotto',$_SESSION['user']);
                    $result_pro =$promozioni->read();
                    $rows =array();
                    while($row = $result_pro->fetch_array(MYSQLI_ASSOC)){
                      $rows[] = $row;
                    }
                    if(!count($rows)){
                      EmptyBarGray('non sono presenti prodotti');
                    }
                    else{
                      foreach($rows as $row){
                            echo '<div class="contenuto_corrente">
                            <a href="negozio.php?prod='.$row['titolo'].'">
                          <img src="images/prodotto/'.$row['source'].'" alt="'.$row['alt'].'"/>
                          '.$row['titolo'].' 
                          </a>
                          </div>';
                      }
                    }
                  ?> 
</div> 

        <div id="colonna_destra_sotto">
              <div id="controllo_Prod"></div>
              <form  action="../mainForm/deleteProdotto.php" method="post" onsubmit="return validateProd()">
                <div>
                  <fieldset>
                  <legend class="intestazione">Elimina Prodotti</legend>

                  <label for="elimina_prodotto">Nome Prodotto:</label>
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