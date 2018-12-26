
<div id="content_generale">
    <h3 id="titolo_generale">Generale</h3>
    
    <div id="sopra">
        <div class="form_sopra">
            <div id="verifica_contatti"></div>
            <form action="../mainForm/change_shop_contacts.php" method="post" onsubmit="return checkEmail(this)" >
            <?php
                $contatti =new infos_changer();
                $array_contatti =$contatti->read();
                echo '
                <div>
                    <fieldset>
                        <legend class="intestazione">Modifica Contatti</legend>
                        <label for="telefono">Telefono / Fax:</label>
                        <input type="text" name="Telefono" id="telefono" value="'.$array_contatti['telefono'].'"/>
                        <label for="Email">Email:</label>
                        <input type="text" name="Email" id="Email" value="'.$array_contatti['mail'].'" />
                        <label for="Sito_web">Sito web:</label>
                        <input type="text" name="Sito_web" id="Sito_web" value="'.$array_contatti['sito'].'" />
                        <div class="invia">   
                            <input type="reset" value="Reset"/>
                            <input type="submit" value="Salva"/>    
                        </div>  
                    </fieldset>                         
                </div>      
                ';?>                
            </form>
        </div>
        <div class="form_sopra">
            <div id="verifica_passw"></div>
            <form  action="../mainForm/changePassword.php" method="post" onsubmit="return validateForm(this)">
                <div>
                    <fieldset>
                        <legend class="intestazione">Modifica Password</legend>
                        <label for="password">Password:</label>
                        <input type="password" name="nuova_password" id="password"/>
                        <label for="conferma_password">Conferma Password:</label>
                        <input type="password" name="conferma_nuova_password" id="conferma_password"/> 
                        <div class="invia">              
                            <input type="reset"  value="Reset"/>  
                            <input type="submit" value="Salva"/>   
                        </div>  
                    </fieldset>                           
                </div>
            </form>
        </div>          
    </div>

    <div id="parte_centrale">  
        <div class="form_centrali"> 
            <div id="logoChange"></div>
            <form action="../mainForm/insertLogo.php" method="post" enctype="multipart/form-data" onsubmit="return changeLogo()">
                    <div>
                    <fieldset>
                        <legend class="intestazione">Modifica Logo</legend>

                        <label for="immagine">Selezionare un file:</label>
                        <input type="file" name="immagine" id="immagine"/>
                        <input type="submit" value="Salva"/>
                    </fieldset>
                </div>
            </form>
        </div>

        <div class="form_centrali">
            <div id="verifica_nomenegozio"></div>
            <form   action="../mainForm/change_shop_name.php" method="post" onsubmit="return negozio(this)" > 
                <div id="modifica_nome">
                    <fieldset>
                    <legend class="intestazione">Modifica nome negozio </legend>
                    <label for="nome_negozio">Nome:</label>
                    <?php 
                        $negozio=new name_change();
                        $nome=$negozio->read();
                        echo '<input type="text" name="nome_negozio" id="nome_negozio" value="'.$nome['negozio'].'" />';
                    ?>
                    <input type="submit" value="Salva"/>
                </fieldset>
                </div>
            </form>
        </div>
    </div>

    <div id="sotto">

        <div id="sinistra">
            <div id="verifica_orario"></div>
            <form action="../mainForm/changeOrari.php" method="post" onsubmit="return checkorario(this)">
                <fieldset>
                    <legend class="intestazione">Modifica Orario</legend>
                    <p id="esempio">Il centro apre alle 08:30 <br/> chiude alle 21:30  </p>

                    <?php 
                        $orari = new orario($_SESSION['user']);
                        $ora=$orari->read()->fetch_array(MYSQLI_NUM);
                        $giorni=$orari->getGiorni();
                        $giorniHTML=$orari->getGiorniHTML();
                        $numeri=$orari->getNumeri();
                        for($i=0;$i<7;$i++){
                            echo '             
                            <div class="orario">
                                <label for="'.$giorni[$i].'"> '.$giorniHTML[$i].' :</label>
                                <input type="text" name="'.$giorni[$i].'" id="'.$giorni[$i].'" value="'.$ora[$i].'" maxlength="11" onkeypress="return onlyNumeric(event);"/>
                                <div id="'.$numeri[$i].'"></div>
                            </div>';
                        }
                    ?>
                    <div class="pulsante">
                        <input  type="submit" value="Salva"/>                                
                        <input  type="reset" value="Reset"/>  
                    </div> 
                </fieldset>
            </form>
        </div>

        <div id="destra">
            <div id="descrizione">
                <div id="verifica_descrizione"></div>
                <form action="../mainForm/change_shop_slogan.php" method="post" onsubmit="return descrizione(this)">
                    <div>
                        <fieldset>
                            <legend class="intestazione">Modifica Descrizione</legend>

                            <label for="testo_motto">Motto:</label>                                          
                            <?php 

                                $testo = new shop_slogan();
                                $array_testo =$testo->read();

                                $langMotto=getTextLanguage($array_testo['motto'],'it');
                                $startMotto=NULL;
                                if($langMotto != 'it'){
                                    $startMotto='xml:lang="'.$langMotto.'"';
                                }

                                $langDescr=getTextLanguage($array_testo['descrizione'],'it');
                                $startDescr=NULL;
                                if($langDescr != 'it'){
                                    $startDescr='xml:lang="'.$langDescr.'"';
                                }

                                echo '
                                <textarea name="testo_motto" id="testo_motto" rows="2" cols="50" '.$startMotto.'>'.$array_testo['motto'].'</textarea>  
                                <label for="testo_descrizione">Descrizione:</label>
                                <textarea name="testo_descrizione" id="testo_descrizione" rows="5" cols="50" '.$startDescr.'>'.$array_testo['descrizione'].'</textarea>';
                            
                            ?>
                            <div class="pulsante">
                                <input  type="submit" value="Salva"/>                                
                                <input  type="reset" value="Reset"/>   
                            </div>  
                        </fieldset>          
                    </div> 
                </form>
            </div>
        </div>

    </div>
</div>