(function(){   
  if (window.addEventListener)
  {
    window.addEventListener("load", nascondi_loading_screen, false);    
  }else{
    window.attachEvent("onload", nascondi_loading_screen);
  }
})();

function mostra_loading_screen()
{
  document.getElementById("loading_screen").style.display = 'block';
}
function nascondi_loading_screen()
{
  document.getElementById("loading_screen").style.display = 'none';
}
