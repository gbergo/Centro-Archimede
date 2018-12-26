<h3 id="titolo_generale">Generale</h3>

<div id="sotto">
    <div class="form_sotto">
        <div id="verifica_passwAdmin"></div>
        <form  action="../mainForm/changePassword.php" method="post" onsubmit="return validateForm_1(this)" >
            <div>
            <fieldset>
               <legend class="intestazione"> Modifica Password</legend>

               <label for="nuova_password">Password:</label>
               <input type="password" name="nuova_password" id="nuova_password" />

               <label for="conferma_nuova_password">Conferma Password:</label>
               <input type="password" name="conferma_nuova_password" id="conferma_nuova_password"/>  

               <div class="invia">   
                   <input name="Tasto Reset" type="reset" value="Reset"/>  
                   <input name="Tasto Salva" type="submit" value="Salva"/>
               </div> 
            </fieldset>
            </div>
        </form>
    </div>

    <div class="form_sotto">
      <div id="controllo_creaNeg"></div>
      <form action="../mainForm/newUser.php" method="post" onsubmit="return validateForm(this)">
        <div>
          <fieldset>
             <legend class="intestazione">Creazione negozio</legend>

              <label for="nome_negozio">Nome Negozio:</label>
              <input type="text" id="nome_negozio" name="username"/>    

              <label for="password">Password:</label>
              <input type="password" id="password" name="password" />

              <label for="Password_1">Conferma Password:</label>
              <input type="password" id="Password_1" name="Password_1"  />  

              <div class="invia">                       
                <input type="reset"  name="tasto_reset"  value="Reset"/>  
                <input type="submit" name="tasto_salva"  value="Salva"/>
              </div>
         </fieldset>
        </div>
       </form>
     </div>

    <div class="form_sotto">
      <div id="controllo_eliminaNeg"></div>
      <form  action="../mainForm/deleteUser.php" method="post" onsubmit="return validateUser()">
        <div>
          <fieldset>
            <legend class="intestazione">Elimina negozio</legend>
              
               <label for="elimina_negozio">Nome Negozio:</label>

               <select name="elimina_negozio" id="elimina_negozio">
                  <option value="Cerca nel menu:">Cerca nel menu:</option>
                  <?php 
                $log = new login();
                $result_pro =$log->read();
                $rows =array();
                while($row = $result_pro->fetch_array(MYSQLI_ASSOC)){
                  $rows[] = $row;
                }
                if(count($rows)){
                    foreach($rows as $row){
                        echo '<option value="'.$row['username'].'">'.$row['username'].'</option>';           
                    }
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

</div>  
