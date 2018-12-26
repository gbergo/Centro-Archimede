<?php

    require_once __DIR__.'/../../query/image.php';
    require_once __DIR__.'/../../utility/EmptyBarGray.php';

?>

    <h2 id="intestazione">PROMOZIONI CORRENTI</h2>

<?php
    $promozione = new image('promozione');
    $result_promozione =$promozione->read();
            $rows =array();
            while($row = $result_promozione->fetch_array(MYSQLI_ASSOC)){
                $rows[] = $row;
            }
            if(!count($rows)){
                EmptyBarGray('prossimamente');
            }
            else{
                echo '<div id="PromozioniAttive">';
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
                echo '</div>';
            }
?>