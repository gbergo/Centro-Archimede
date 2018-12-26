   function checkPromo(){

        var nome_prodotto=document.getElementById('nome_prodotto').value;
        var campo_alt=document.getElementById('campo_alt').value;

        if(nome_prodotto=="" || nome_prodotto==" ")
        {
          var a="Nome non valido";
    document.getElementById("nuova_promozione").innerHTML = a ;
    return false;
        }

        if(campo_alt=="" || campo_alt==" ")
        {
          var a="Alternativa testuale non valida";
    document.getElementById("nuova_promozione").innerHTML = a ;
    return false;
        }

        var data=document.getElementById('data').value;

        var stacco=data.split("-");
      var gg=stacco[0];
      var mm=stacco[1];
      var nn=stacco[2];
      

      if(nn==undefined || gg==undefined || mm==undefined){
       var a="Data inizio </br> Scrivere la data nel formato </br> GG-MM-ANNO";
    document.getElementById("nuova_promozione").innerHTML = a ;
    return false;
}

      var controllo=gg.length;
      var controllo_1=mm.length;
      var controllo_2=nn.length;

     if(controllo!=2  || controllo_1!=2 || controllo_2!=4 )
      {var a="Data inizio </br> Scrivere la data nel formato </br> GG-MM-ANNO";
    document.getElementById("nuova_promozione").innerHTML = a ;
    return false;
      }

      var giorno=parseInt(stacco[0]);
      var mese=parseInt(stacco[1]);
      var anno=parseInt(stacco[2]);
  

      if(giorno<00 || giorno>31 || mm<01 || mm>12 || anno<=2017)
      {
        var a="Data Inizio non valida";
    document.getElementById("nuova_promozione").innerHTML = a ;
    return false;
      }

      var data_1=document.getElementById('data_fine').value;

      var stacco_1=data_1.split("-");
      var gg_1=stacco_1[0];
      var mm_1=stacco_1[1];
      var nn_1=stacco_1[2];
      
      if(nn_1==undefined || gg_1==undefined || mm_1==undefined){
        var a="Data Fine </br> Scrivere la data nel formato </br> GG-MM-ANNO";
    document.getElementById("nuova_promozione").innerHTML = a ;
    return false;
      }
      var controllo_1=gg.length;
      var controllo_1_1=mm.length;
      var controllo_2_1=nn.length;

     if(controllo_1!=2  || controllo_1_1!=2 || controllo_2_1!=4 )
      {
        var a="Data Fine </br> Scrivere la data nel formato </br> GG-MM-ANNO";
    document.getElementById("nuova_promozione").innerHTML = a ;
    return false;
      }

      var giorno_1=parseInt(stacco_1[0]);
      var mese_1=parseInt(stacco_1[1]);
      var anno_1=parseInt(stacco_1[2]);
  

      if(giorno_1<00 || giorno_1>31 || mm_1<01 || mm_1>12 || anno_1<=2017 || anno_1<anno ||mese_1<mese 
        || mese_1==mese && anno_1==anno && giorno_1<giorno)
      {
        var a="Data Fine non valida";
    document.getElementById("nuova_promozione").innerHTML = a ;
    return false;
      }

      var descrizione_promozione=document.getElementById('descrizione_prodotto').value;

      if(descrizione_promozione=="" || descrizione_promozione==" ")
      {
        var a="Descrizione Promozione non valida";
    document.getElementById("nuova_promozione").innerHTML = a ;
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
    document.getElementById("nuova_promozione").innerHTML = a ;
    return false;
     } 
}else{
  var a="Inserire un'immagine";
    document.getElementById("nuova_promozione").innerHTML = a ;
    return false;
}

return true; 
}


  function validatePromo(){
  var indice_selezionato = document.getElementById('elimina_prodotto').selectedIndex;
  if(indice_selezionato==0)
    {var a="Nome negozio non valido";
    document.getElementById("deletePromo").innerHTML = a ;
    return false;}else return true;
}