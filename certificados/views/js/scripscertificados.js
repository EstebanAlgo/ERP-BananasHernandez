
	
function remitenteregistrado(form)

{ 


form.registrosolicitante[0].disabled=false;
form.registrosolicitante[1].disabled=true;
form.registrosolicitante[2].disabled=true;
form.registrosolicitante[3].disabled=true;
form.registrosolicitante[4].disabled=true;

}

function n_registroremitente(form)
{ 

form.registrosolicitante[0].disabled=true;
form.registrosolicitante[1].disabled=false;
form.registrosolicitante[2].disabled=false;
form.registrosolicitante[3].disabled=false;
form.registrosolicitante[4].disabled=false;

}
