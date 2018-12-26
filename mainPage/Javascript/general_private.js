function validateForm(form) {
    
   if (form.conferma_password.value != form.password.value || form.password.value=="" || form.password.value==" ") {
    form.password.focus()
    form.password.select()
    var o="Password non valida ";
    document.getElementById("verifica_passw").innerHTML = o ;

    return false
  }
  else{
  return true}
}


function validaEmail(email) {
  
    var regexp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regexp.test(email);
}

function checkEmail(form){
  var email = form.Email.value;
  var sito=form.Sito_web.value;
  var telefono=form.Telefono.value;
  
    if(isNaN(telefono) || telefono=="" || telefono==" ")
     { var o="ERRORE N.TELEFONO !!!";
    document.getElementById("verifica_contatti").innerHTML = o ;
    return false;}
    else{
    
  if (validaEmail(email) && email!="" && email!=" ") {
      if(sito!="" && sito!=" ")
    {
        return true;}
    else{
    
         var o="SITO WEB NON VALIDO !!!";
    document.getElementById("verifica_contatti").innerHTML = o ;
    return false;}
  } 
       
    else{
      var o="ERRORE EMAIL !!!";
    document.getElementById("verifica_contatti").innerHTML = o ;

return false;
  
}}
return true;
}


function checkorario(form){
    
    var Lunedi=form.lunedi.value;
    var Martedi =form.martedi.value;
    var Mercoledi=form.mercoledi.value;
    var Giovedi=form.giovedi.value;
    var Venerdi=form.venerdi.value;
    var Sabato=form.sabato.value;
    var Domenica=form.domenica.value;

    if(Lunedi=="" || Martedi=="" || Mercoledi=="" || Giovedi=="" || Venerdi=="" || Sabato=="" || Domenica=="")
    {
        var o="Tabella orario non completa !";
    document.getElementById("verifica_orario").innerHTML = o ;
    return false;
    }



    var controlla=Lunedi.slice(5, -5);
    var controlla_1=Martedi.slice(5, -5);
    var controlla_2=Mercoledi.slice(5, -5);
    var controlla_3=Giovedi.slice(5, -5);
    var controlla_4=Venerdi.slice(5, -5);
    var controlla_5=Sabato.slice(5, -5);
    var controlla_6=Domenica.slice(5, -5);

    var cane=true;

    if(Lunedi!="chiuso"){
    if(controlla!="-" )  
    {document.all.uno.innerHTML = ".";
cane=false;} else{ document.all.uno.innerHTML = null;}}
    
    if(Martedi!="chiuso"){
    if(controlla_1!="-")
        { document.all.due.innerHTML = ".";
cane=false;} else{ document.all.due.innerHTML = null;}}

    if(Mercoledi!="chiuso"){
    if(controlla_2!="-")
        {document.all.tre.innerHTML = ".";
cane=false;} else{ document.all.tre.innerHTML = null;}}

    if(Giovedi!="chiuso"){
    if(controlla_3!="-")
        {document.all.quattro.innerHTML = ".";
cane=false;} else{ document.all.quattro.innerHTML = null;}}

    if(Venerdi!="chiuso"){
    if(controlla_4!="-")
        {document.all.cinque.innerHTML = ".";
cane=false;} else{ document.all.cinque.innerHTML = null;}}

    if(Sabato!="chiuso"){
    if(controlla_5!="-")
        {document.all.sei.innerHTML = ".";
cane=false;} else{ document.all.sei.innerHTML = null;}}

    if(Domenica!="chiuso"){
    if(controlla_6!="-")
         {document.all.sette.innerHTML = ".";
 cane=false;} else{ document.all.sette.innerHTML = null;}}

        if(cane==false){
            var o="Scrivere l'orario nel formato </br> HH:MM-HH:MM";
            document.getElementById("verifica_orario").innerHTML = o ;return false;}

    var primi_punti=Lunedi.slice(2, -8);
    var primi_punti_1=Martedi.slice(2, -8);
    var primi_punti_2=Mercoledi.slice(2, -8);
    var primi_punti_3=Giovedi.slice(2, -8);
    var primi_punti_4=Venerdi.slice(2, -8);
    var primi_punti_5=Sabato.slice(2, -8);
    var primi_punti_6=Domenica.slice(2, -8);


    if(Lunedi!="chiuso"){
    if(primi_punti!=":")  
    {
document.all.uno.innerHTML = ".";
cane=false; } else{ document.all.uno.innerHTML = null;}}

    if(Martedi!="chiuso"){
    if(primi_punti_1!=":")
        {
    document.all.due.innerHTML = ".";
    cane=false;} else{ document.all.due.innerHTML = null;}}

    if(Mercoledi!="chiuso"){
    if(primi_punti_2!=":")
        {document.all.tre.innerHTML = ".";
    cane=false;} else{ document.all.tre.innerHTML = null;}}

    if(Giovedi!="chiuso"){
    if(primi_punti_3!=":")
        {document.all.quattro.innerHTML = ".";
    cane=false;} else{ document.all.quattro.innerHTML = null;}}

    if(Venerdi!="chiuso"){
    if(primi_punti_4!=":")
        {document.all.cinque.innerHTML = ".";
    cane=false;} else{ document.all.cinque.innerHTML = null;}}

    if(Sabato!="chiuso"){
    if(primi_punti_5!=":")
        {document.all.sei.innerHTML = ".";
    cane=false;} else{ document.all.sei.innerHTML = null;}}

    if(Domenica!="chiuso"){
    if(primi_punti_6!=":")
        {document.all.sette.innerHTML = ".";
    cane=false;} else{ document.all.sette.innerHTML = null;}}

    if(cane==false){
        var o="Mettere ':' tra hh:mm nell'orario apertura ";
    document.getElementById("verifica_orario").innerHTML = o ;
    return false;}

    var finali_punti=Lunedi.slice(8, -2);
    var finali_punti_1=Martedi.slice(8, -2);
    var finali_punti_2=Mercoledi.slice(8, -2);
    var finali_punti_3=Giovedi.slice(8, -2);
    var finali_punti_4=Venerdi.slice(8, -2);
    var finali_punti_5=Sabato.slice(8, -2);
    var finali_punti_6=Domenica.slice(8, -2);

    if(Lunedi!="chiuso"){
    if(finali_punti!=":")
    {document.all.uno.innerHTML = ".";
    cane=false;} else{ document.all.uno.innerHTML = null;}}

    if(Martedi!="chiuso"){
    if(finali_punti_1!=":")
        {document.all.due.innerHTML = ".";
    cane=false;} else{ document.all.due.innerHTML = null;}}

    if(Mercoledi!="chiuso"){
    if(finali_punti_2!=":")
        {document.all.tre.innerHTML = ".";
    cane=false;} else{ document.all.tre.innerHTML = null;}}

    if(Giovedi!="chiuso"){
    if(finali_punti_3!=":")
        {document.all.quattro.innerHTML = ".";
    cane=false;} else{ document.all.quattro.innerHTML = null;}}

    if(Venerdi!="chiuso"){
    if(finali_punti_4!=":")
        {document.all.cinque.innerHTML = ".";
    cane=false;} else{ document.all.cinque.innerHTML = null;}}

    if(Sabato!="chiuso"){
    if(finali_punti_5!=":")
        {document.all.sei.innerHTML = ".";
    cane=false;} else{ document.all.sei.innerHTML = null;}}

    if(Domenica!="chiuso"){
    if(finali_punti_6!=":")
         {document.all.sette.innerHTML = ".";
     cane=false;} else{ document.all.sette.innerHTML = null;}}

     if(cane==false){
        var o="Mettere ':' tra hh:mm nell'orario chiusura";
    document.getElementById("verifica_orario").innerHTML = o ;
    return false;}


     if(Lunedi!="chiuso"){
    var uno=Lunedi.split("-");
    var lun_a=uno[0].split(":");
    var lun_c=uno[1].split(":");}

    if(Martedi!="chiuso"){
    var due=Martedi.split("-");
    var mar_a=due[0].split(":");
    var mar_c=due[1].split(":");}

    if(Mercoledi!="chiuso"){
    var tre=Mercoledi.split("-");
    var mec_a=tre[0].split(":");
    var mec_c=tre[1].split(":");}

    if(Giovedi!="chiuso"){
    var quattro=Giovedi.split("-");
    var gio_a=quattro[0].split(":");
    var gio_c=quattro[1].split(":");}

    if(Venerdi!="chiuso"){
    var cinque=Venerdi.split("-");
    var ven_a=cinque[0].split(":");
    var ven_c=cinque[1].split(":");}

    if(Sabato!="chiuso"){
    var sei=Sabato.split("-");
    var sab_a=sei[0].split(":");
    var sab_c=sei[1].split(":");}

    if(Domenica!="chiuso"){
    var sette=Domenica.split("-");
    var dom_a=sette[0].split(":");
    var dom_c=sette[1].split(":");}

    if(Lunedi!="chiuso"){
    var lunedi_open_0=parseInt(lun_a[0]);
    var lunedi_open_1=parseInt(lun_a[1]);
    var lunedi_close_0=parseInt(lun_c[0]);
    var lunedi_close_1=parseInt(lun_c[1]);}

    if(Martedi!="chiuso"){
    var martedi_open_0=parseInt(mar_a[0]);
    var martedi_open_1=parseInt(mar_a[1]);
    var martedi_close_0=parseInt(mar_c[0]);
    var martedi_close_1=parseInt(mar_c[1]);}

    if(Mercoledi!="chiuso"){
    var mercoledi_open_0=parseInt(mec_a[0]);
    var mercoledi_open_1=parseInt(mec_a[1]);
    var mercoledi_close_0=parseInt(mec_c[0]);
    var mercoledi_close_1=parseInt(mec_c[1]);}

    if(Giovedi!="chiuso"){
    var giovedi_open_0=parseInt(gio_a[0]);
    var giovedi_open_1=parseInt(gio_a[1]);
    var giovedi_close_0=parseInt(gio_c[0]);
    var giovedi_close_1=parseInt(gio_c[1]);}

    if(Venerdi!="chiuso"){
    var venerdi_open_0=parseInt(ven_a[0]);
    var venerdi_open_1=parseInt(ven_a[1]);
    var venerdi_close_0=parseInt(ven_c[0]);
    var venerdi_close_1=parseInt(ven_c[1]);}

    if(Sabato!="chiuso"){
    var sabato_open_0=parseInt(sab_a[0]);
    var sabato_open_1=parseInt(sab_a[1]);
    var sabato_close_0=parseInt(sab_c[0]);
    var sabato_close_1=parseInt(sab_c[1]);}

    if(Domenica!="chiuso"){
    var domenica_open_0=parseInt(dom_a[0]);
    var domenica_open_1=parseInt(dom_a[1]);
    var domenica_close_0=parseInt(dom_c[0]);
    var domenica_close_1=parseInt(dom_c[1]);}

var lu , mi,me,gi,ve,sa,dm=true;

    if(Lunedi!="chiuso"){
    if(lunedi_open_0<8 || lunedi_open_0>=21 || (lunedi_open_0==21 && lunedi_open_1>0 )|| (lunedi_open_0==8 && lunedi_open_1<30 )|| lunedi_open_1>59)
        {
            document.all.uno.innerHTML = ".";  lu=false; }else{ document.all.uno.innerHTML = null;}
}
    
    if(Martedi!="chiuso"){
    if(martedi_open_0<8 || martedi_open_0>=21 || martedi_open_0==21 && martedi_open_1>0 || martedi_open_0==8 && martedi_open_1<30 || martedi_open_1>59)
            { document.all.due.innerHTML = "."; mi=false; }else{ document.all.due.innerHTML = null;}
    }

    if(Mercoledi!="chiuso"){
    if(mercoledi_open_0<8 || mercoledi_open_0>=21 || mercoledi_open_0==21 && mercoledi_open_1>0 || mercoledi_open_0==8 && mercoledi_open_1<30 || mercoledi_open_1>59)
            { document.all.tre.innerHTML = ".";  me=false; }else{ document.all.tre.innerHTML = null;}
    }

    if(Giovedi!="chiuso"){
    if(giovedi_open_0<8 || giovedi_open_0>=21 || giovedi_open_0==21 && giovedi_open_1>0 || giovedi_open_0==8 && giovedi_open_1<30 || giovedi_open_1>59)
    { document.all.quattro.innerHTML = "."; gi=false; }else{ document.all.quattro.innerHTML = null;}
}

    if(Venerdi!="chiuso"){
    if( venerdi_open_0<8 || venerdi_open_0>=21 || venerdi_open_0==21 && venerdi_open_1>0 || venerdi_open_0==8 && venerdi_open_1<30 || venerdi_open_1>59)
    { document.all.cinque.innerHTML = "."; ve=false; } else{ document.all.cinque.innerHTML = null;}
}

    if(Sabato!="chiuso"){
    if( sabato_open_0<8 || sabato_open_0>=21 || sabato_open_0==21 && sabato_open_1>0 || sabato_open_0==8 && sabato_open_1<30 || sabato_open_1>59)
        { document.all.sei.innerHTML = "."; sa=false; } else{ document.all.sei.innerHTML = null;}
}

    if(Domenica!="chiuso"){
    if(domenica_open_0<8 || domenica_open_0>=21 || domenica_open_0==21 && domenica_open_1>0 || domenica_open_0==8 && domenica_open_1<30 || domenica_open_1>59)
        { document.all.sette.innerHTML = "."; dm=false; } else{ document.all.sette.innerHTML = null;}
}



            if(Lunedi!="chiuso" && lu!=false){
           if(lunedi_close_0<=9 || lunedi_close_0>21 || lunedi_close_0==21 && lunedi_close_1>30 || lunedi_close_1>59) 
            { document.all.uno.innerHTML = "."; lu=false; } else{ document.all.uno.innerHTML = null;}
    }

            if(Martedi!="chiuso" && mi!=false){
           if( martedi_close_0<=9 || martedi_close_0>21 || martedi_close_0==21 && martedi_close_1>30 || martedi_close_1>59)
             { document.all.due.innerHTML = "."; mi=false; } else{ document.all.due.innerHTML = null;}
     }

            if(Mercoledi!="chiuso" && me!=false){
           if( mercoledi_close_0<=9 || mercoledi_close_0>21 || mercoledi_close_0==21 && mercoledi_close_1>30 || mercoledi_close_1>59)
             { document.all.tre.innerHTML = "."; me=false; } else{ document.all.tre.innerHTML = null;}
     }

            if(Giovedi!="chiuso" && gi!=false){
           if(giovedi_close_0<=9 || giovedi_close_0>21 || giovedi_close_0==21 && giovedi_close_1>30 || giovedi_close_1>59 )
     { document.all.quattro.innerHTML = "."; gi=false; } else{ document.all.quattro.innerHTML = null;}
         }

             if(Venerdi!="chiuso" && ve!=false){
            if( venerdi_close_0<=9 || venerdi_close_0>21 || venerdi_close_0==21 && venerdi_close_1>30 || venerdi_close_1>59)
     { document.all.cinque.innerHTML = "."; ve=false; } else{ document.all.cinque.innerHTML = null;}
         }

             if(Sabato!="chiuso" && sa!=false){
           if(sabato_close_0<=9 || sabato_close_0>21 || sabato_close_0==21 && sabato_close_1>30 || sabato_close_1>59)
            { document.all.sei.innerHTML = "."; sa=false; } else{ document.all.sei.innerHTML = null;}
         }

            if(Domenica!="chiuso" && dm!=false){
         if( domenica_close_0<=9 || domenica_close_0>21 || domenica_close_0==21 && domenica_close_1>30 || domenica_close_1>59)
        { document.all.sette.innerHTML = "."; dm=false; } else{ document.all.sette.innerHTML = null;}
    }

    if (lu==false || mi==false || me==false ){
        var o="Orario non valido ";
    document.getElementById("verifica_orario").innerHTML = o ;
    return false;}

    if(ve==false)
{
        var o="Orario non valido ";
    document.getElementById("verifica_orario").innerHTML = o ;
    return false;}

    if(gi==false)
        {
        var o="Orario non valido ";
    document.getElementById("verifica_orario").innerHTML = o ;
    return false;}

    if(sa==false){
        var o="Orario non valido ";
    document.getElementById("verifica_orario").innerHTML = o ;
    return false;}
    if(dm==false){
        var o="Orario non valido ";
    document.getElementById("verifica_orario").innerHTML = o ;
    return false;}

return true
}



function descrizione(form){
    var uno=form.testo_motto.value;
    var due=form.testo_descrizione.value;

    if(uno!="" && uno!=" " && due!="" && due!=" ")
    {
        return true;
    }
    else{
        if(uno=="" || uno==" ")
        {
            var o="Motto non valido ";
    document.getElementById("verifica_descrizione").innerHTML = o ;
    return false;
        }
        else
        var o="Descrizione non valida ";
    document.getElementById("verifica_descrizione").innerHTML = o ;
    return false;

    }
}

function negozio(form){
    var nome=form.nome_negozio.value;
    if(nome!="" && nome!=" ")
        {return true;}
    else{
        var o="Nome Negozio non valido ";
    document.getElementById("verifica_nomenegozio").innerHTML = o ;
    return false;

    }
}

function onlyNumeric(evt){
   
   var charCode=(evt.which)?evt.which:event.keyCode;

if(charCode==118 || charCode==99 || charCode==97 || charCode==104 || charCode==105 || charCode==117 || charCode==115 || charCode==111 || charCode==8){return true;}

    if(charCode!=45  && (charCode<48 || charCode>58))
      {return false;}
}


function changeLogo()
{
        var img=document.getElementById('immagine').value;     
if(img!="") { 
     var fup = document.getElementById('immagine'); 
     var fileName = fup.value; 
     var ext = fileName.substring(fileName.lastIndexOf('.') + 1); 
     if(ext != "JPEG" && ext != "jpeg" && ext != "jpg" && ext != "JPG" && ext != "PNG" && ext != "png"  
      &&  ext != "GIF" && ext != "gif" ){ 
        var a="Immagine consentite:</br> JPEG  PNG  JPG  GIF";
    document.getElementById("logoChange").innerHTML = a ;
    return false;
     } 
}else{
  var a="Inserire un'immagine";
    document.getElementById("logoChange").innerHTML = a ;
    return false;
}

return true; 

}