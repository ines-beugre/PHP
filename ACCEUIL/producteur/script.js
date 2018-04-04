
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
	if( (verifChamp(f.nom_producteur)== false) || (verifChamp(f.prenom_producteur)== false) || (verifChamp(f.telephone_producteur)==false) || (verifChamp(f.rue_producteur)==false) || (verifChamp(f.codepost_producteur)==false )|| (verifChamp(f.email_producteur)==false) || (verifChamp(f.motdepass)==false) || (verifChamp(f.conf_motdepass)==false) || (verifChamp(f.photo_producteur)==false) || (verifChamp(f.photo_producteur)==false) || (verifChamp(f.presentation)==false)) {
		return false;
	}
	else{
		return true;
	}
	
}