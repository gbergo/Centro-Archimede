<?php

require_once __DIR__.'/../../query/shop.php';
require_once __DIR__.'/../../utility/EmptyBarGray.php';

    $shop = new shop();
    $result_pro =$shop->all();
    $rows =array();
    while($row = $result_pro->fetch_array(MYSQLI_ASSOC)){
        $rows[] = $row;
    }
    echo '<h2 id="intestazione"> I nostri negozi</h2>';
    if(!count($rows)){
        EmptyBarGray('Presto nuove aperture');
    }
    else{
        echo '<ul id="negozio">';
        foreach($rows as $row){
            echo '
            <li>
            <a href="negozio.php?shop='.$row['username'].'">
                <img src="images/logo/'.$row['logo'].'" alt="'.$row['alt'].'"/>
            '.$row['negozio'].'
            </a>
            </li>';
        }
        echo '</ul>';
    }
?>