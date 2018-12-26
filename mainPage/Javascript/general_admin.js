function validateForm(form) {
    
        if(form.username.value!="" && form.username.value!=" " && form.username.value!="admin")
        {
   if (form.password.value != form.Password_1.value || form.password.value=="" || form.password.value==" ") {
    form.password.focus()
    form.password.select()
    var o="Password non corretta !";
    document.getElementById("controllo_creaNeg").innerHTML = o ;

    return false
  }

  return true
}else{
    var o="Nome negozio non valido ";
    document.getElementById("controllo_creaNeg").innerHTML = o ;
return false;
}

}

function validateForm_1(form) {
    
   if (form.password.value != form.Password_1.value || form.password.value=="" || form.password.value==" ") {
    form.password.focus()
    form.password.select()
    var o="Password non corretta !";
 document.getElementById("verifica_passwAdmin").innerHTML = o ;

    return false
  }

  return true
}



function descrizione(){

	var indice_selezionato = document.getElementById('evento').selectedIndex;
	if(indice_selezionato>0)
    {
      var dats= document.getElementById('data').value;

      var stacco=dats.split("-");
      var gg=stacco[0];
      var mm=stacco[1];
      var nn=stacco[2];
      
      if(nn==undefined || gg==undefined || mm==undefined){
      	var a="Scrivere la data nel formato </br> GG-MM-ANNO";
    document.getElementById("controllo_openclose").innerHTML = a ;
    return false;
      }
      var controllo=gg.length;
      var controllo_1=mm.length;
      var controllo_2=nn.length;

     if(controllo!=2  || controllo_1!=2 || controllo_2!=4 )
      {
        var a="Scrivere la data nel formato </br> GG-MM-ANNO";
    document.getElementById("controllo_openclose").innerHTML = a ;
    return false;
      }

      var giorno=parseInt(stacco[0]);
      var mese=parseInt(stacco[1]);
      var anno=parseInt(stacco[2]);
  

      if(giorno<00 || giorno>31 || mm<01 || mm>12 || anno<=2017)
      {
        var a="Data non valida";
    document.getElementById("controllo_openclose").innerHTML = a ;
    return false;
      }

      return true
	}
  else {var a="Tipo di evento non valido";
    document.getElementById("controllo_openclose").innerHTML = a ;
    return false;}
   
}


function validateUser(){
	var indice_selezionato = document.getElementById('elimina_negozio').selectedIndex;
	if(indice_selezionato==0)
		{var a="Nome negozio non valido";
    document.getElementById("controllo_eliminaNeg").innerHTML = a ;
    return false;}else return true;
}

function novita1(){
  var descr= document.getElementById('novita').value ;

  

  	var dats= document.getElementById('data_novita').value;

      var stacco=dats.split("-");
      var gg=stacco[0];
      var mm=stacco[1];
      var nn=stacco[2];
      
      if(nn==undefined || gg==undefined || mm==undefined){
      	var a="Scrivere la data nel formato </br> GG-MM-ANNO";
    document.getElementById("controllo_novita").innerHTML = a ;
    return false;
      }

      var controllo=gg.length;
      var controllo_1=mm.length;
      var controllo_2=nn.length;

     if(controllo!=2  || controllo_1!=2 || controllo_2!=4 )
      {
        var a="Scrivere la data nel formato </br> GG-MM-ANNO";
    document.getElementById("controllo_novita").innerHTML = a ;
    return false;
      }

      var giorno=parseInt(stacco[0]);
      var mese=parseInt(stacco[1]);
      var anno=parseInt(stacco[2]);
  

      if(giorno<0 || giorno>31 || mm<1 || mm>12 || anno<=2017)
      {
        var a="Data non valida";
    document.getElementById("controllo_novita").innerHTML = a ;
    return false;
      }

      if(descr=="" || descr==" " || descr=="Inserisci la nuova novità")
  {
    var a="Descrizione non valida";
    document.getElementById("controllo_novita").innerHTML = a ;
    return false;
  }

      return true;
	
  }

  function delete_openclose(){
    var indice_selezionato = document.getElementById('elimina_aperture_chiusure').selectedIndex;
  if(indice_selezionato==0)
    {var a="Data non valida";
    document.getElementById("elimina_openclose").innerHTML = a ;
    return false;}else return true;
  }

  function delete_news(){
     var indice_selezionato = document.getElementById('elimina_novita').selectedIndex;
  if(indice_selezionato==0)
    {var a="Novita' non valida";
    document.getElementById("elimina_news").innerHTML = a ;
    return false;}else return true;
  }