
function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}

function verifChamp(champ)
{
   if(champ.value.length == 0)
   {
      surligne(champ, true);	
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function verifForm(f)
{
	console.log("Je taf");
	if( (verifChamp(f.nom_produit)== false)) {
		return false;
	}
	else{
		return true;
	}
	
 
}