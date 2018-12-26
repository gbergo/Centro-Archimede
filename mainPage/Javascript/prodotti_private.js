function checkProd(){

        var nome_prodotto=document.getElementById('nome_prodotto').value;
        var campo_alt=document.getElementById('campo_alt').value;

        if(nome_prodotto=="" || nome_prodotto==" ")
        {
          var a="Nome non valido";
    document.getElementById("newProduct").innerHTML = a ;
    return false;
        }

        if(campo_alt=="" || campo_alt==" ")
        {
          var a="Alternativa testuale non valida";
    document.getElementById("newProduct").innerHTML = a ;
    return false;
        }

      var descrizione_promozione=document.getElementById('descrizione_prodotto').value;

      if(descrizione_promozione=="" || descrizione_promozione==" ")
      {
        var a="Descrizione Prodotto non valida";
    document.getElementById("newProduct").innerHTML = a ;
    return false;
      }

 var img=document.getElementById('immagine').value;
      if(img!="") { 
     var fup = document.getElementById('immagine'); 
     var fileName = fup.value; 
     var ext = fileName.substring(fileName.lastIndexOf('.') + 1); 
     if(ext != "JPEG" && ext != "jpeg" && ext != "jpg" && ext != "JPG" && ext != "PNG" && ext != "png" 
     	&&  ext != "GIF" && ext != "gif" ){ 
        var a="Immagine consentite:</br> JPEG  PNG  JPG  GIF";
    document.getElementById("newProduct").innerHTML = a ;
    return false;
     } 
}else{
  var a="Inserire un'immagine";
    document.getElementById("newProduct").innerHTML = a ;
    return false;
}

return true; 

}

      function validateProd(){
  var indice_selezionato = document.getElementById('elimina_prodotto').selectedIndex;
  if(indice_selezionato==0)
    {var a="Nome negozio non valido";
    document.getElementById("controllo_Prod").innerHTML = a ;
    return false;}
}