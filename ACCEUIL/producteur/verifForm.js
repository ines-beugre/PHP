/** * validation du formulaire producteur */
/*
document.name_formulaire.name_champ.value
problème de cache du vaigateur qui fait que les modification dans le js ne sont pas prises en compte: faire ctrl+f5 pour vider le cache

*/

function numtelvalide(arg)
{
	var regex = new RegExp(/^([0-9]{10})/gi);
	/* var regex = new RegExp(/^(06));
	[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2} */
	
	if (regex.test (arg))
	{
		return (true);
	}
	else 
	{
		return (false);
	}
}

//verifiie le formulaire d'enregistrement d'un nouveau producteur	
function verifForm() 
{ var message = ""; var message1="Veuillez entrer ";

//var nombre = document.Formulaire_nvprod.telephone_producteur.value;
var tel = document.Formulaire_nvprod.telephone_producteur.value;

	if ( document.Formulaire_nvprod.nom_producteur.value == "" ) { message += "- Veuillez entrer votre nom !\n";} 
	
	if ( document.Formulaire_nvprod.prenom_producteur.value == "" ) { message += "- Veuillez entrer votre pr\u00e9nom !\n";} 
	
	if ( document.Formulaire_nvprod.telephone_producteur.value == "" ) { message += "- Veuillez entrer votre num\u00e9ro de téléphone !\n";} 
		
		//nombre de chiffre
		if (!numtelvalide(tel)) { message += "- Respectez le champ requis pour le num\u00e9ro de telephone (ex. 0610203040 ) \n";}
	
	if ( document.Formulaire_nvprod.adresse_producteur.value == "" ) { message += "- Veuillez indiquer votre adresse !\n";} 
	
	if ( document.Formulaire_nvprod.codepost_producteur.value == "" ) { message += "- Veuillez entrer  votre code postal !\n";} 
		
	if ( document.Formulaire_nvprod.email_producteur.value == "" ) { message += "- Veuillez entrer votre adresse email !\n";} 
	
	if ( document.Formulaire_nvprod.motdepass.value == "" ) { message += "- Veuillez entrer un mot de passe valide !\n";} 
	if ( document.Formulaire_nvprod.conf_motdepass.value == "" ) { message += "- Veuillez entrer la confirmation de votre mot de passe !\n";} 
		
		if (document.Formulaire_nvprod.motdepass.value!=document.Formulaire_nvprod.conf_motdepass.value) {message+="-Le champ 'Mot de passe' et le champ 'Confirmez le mot de passe' doivent \u00eatre identiques\n";}
		
	if ( document.Formulaire_nvprod.affichecontact.value == "" ) { message += "- Indiquer si vous souhaitez que votre adresse soit visible sur le site !\n";} 
		
	if ( document.Formulaire_nvprod.photo_producteur.value == "" ) { message += "- Inserer votre photo !\n";} 
	if ( document.Formulaire_nvprod.presentation.value == "" ) { message += "- Donnez une pr\u00e9sentation !\n";}
	
	if (message!="") {
		alert (message);
	}
	else {
		document.Formulaire_nvprod.submit();
	}
}	

//fonction pour le formulaire de modification du formulaire du producteur (par le producteur)
function verifModifProd()
{
var message = ""; var message1="Veuillez entrer ";

//var nombre = document.Formulaire_nvprod.telephone_producteur.value;
var tel = document.Formulaire_modifcoord.telephone_producteur.value;

	if ( document.Formulaire_modifcoord.nom_producteur.value == "" ) { message += "- Veuillez entrer votre nom !\n";} 
	
	if ( document.Formulaire_modifcoord.prenom_producteur.value == "" ) { message += "- Veuillez entrer votre pr\u00e9nom !\n";} 
	
	if ( document.Formulaire_modifcoord.telephone_producteur.value == "" ) { message += "- Veuillez entrer votre num\u00e9ro de téléphone !\n";} 
		
		//nombre de chiffre
		if (!numtelvalide(tel)) { message += "- Respectez le champ requis pour le num\u00e9ro de telephone (ex. 0610203040 ) \n";}
	
	if ( document.Formulaire_modifcoord.adresse_producteur.value == "" ) { message += "- Veuillez indiquer votre adresse !\n";} 
	
	if ( document.Formulaire_modifcoord.codepost_producteur.value == "" ) { message += "- Veuillez entrer votre code postal !\n";} 
		
	if ( document.Formulaire_modifcoord.email_producteur.value == "" ) { message += "-Veuillez entrer votre adresse email !\n";} 
	
	if ( document.Formulaire_modifcoord.motdepass.value == "" ) { message += "- Veuillez entrer un mot de passe valide !\n";} 
	if ( document.Formulaire_modifcoord.conf_motdepass.value == "" ) { message += "- Veuillez entrer la confirmation de votre mot de passe !\n";} 
		
		if (document.Formulaire_modifcoord.motdepass.value!=document.Formulaire_modifcoord.conf_motdepass.value) {message+="-Le champ 'Mot de passe' et le champ 'Confirmez le mot de passe' doivent \u00eatre identiques\n";}
		
	if ( document.Formulaire_modifcoord.affichecontact.value == "" ) { message += "- Indiquer si vous souhaitez que votre adresse soit visible sur le site !\n";} 
		
	if ( document.Formulaire_modifcoord.photo_producteur.value == "" ) { message += "- Inserer votre photo !\n";} 
	if ( document.Formulaire_modifcoord.presentation.value == "" ) { message += "- Veuillez vous presenter !\n";}
	
	if (message!="") {
		alert (message);
	}
	else {
		document.Formulaire_modifcoord.submit();
	}
}

//fonction pour le formulaire de modification du formulaire du producteur (par l'admin)
function verifModifProdAd()
{
var message = "";



	if ( document.Formulaire_modif_prod.nom_producteur.value == "" ) { message += "- Veuillez entrer un nom !\n";} 
	
	if ( document.Formulaire_modif_prod.email_producteur.value == "" ) { message += "-Veuillez entrer un adresse email !\n";} 
	
	if ( document.Formulaire_modif_prod.motdepass.value == "" ) { message += "- Veuillez entrer un mot de passe valide !\n";} 
	if ( document.Formulaire_modif_prod.conf_motdepass.value == "" ) { message += "- Veuillez entrer la confirmation de votre mot de passe !\n";} 
		
		if (document.Formulaire_modif_prod.motdepass.value!=document.Formulaire_modif_prod.conf_motdepass.value) {message+="-Le champ 'Mot de passe' et le champ 'Confirmez le mot de passe' doivent \u00eatre identiques\n";}
		
		
	if (message!="") {
		alert (message);
	}
	else {
		document.Formulaire_modif_prod.submit();
	}
}


//fonction de vérification du formulaire admin
function verifFormadmin() 
{ var message = ""; 

	if ( document.Formulaire_nvadmin.nom_admin.value == "" ) { message += "- un nom !\n";} 
	
	if ( document.Formulaire_nvadmin.prenom_admin.value == "" ) { message += "- un pr\u00e9nom !\n";} 
		
	if ( document.Formulaire_nvadmin.email_admin.value == "" ) { message += "- une adresse email !\n";} 
	
	if ( document.Formulaire_nvadmin.motdepass.value == "" ) { message += "- un mot de passe valide !\n";} 
	if ( document.Formulaire_nvadmin.conf_motdepass.value == "" ) { message += "- la confirmation de votre mot de passe !\n";} 
		
		if (document.Formulaire_nvadmin.motdepass.value!=document.Formulaire_nvadmin.conf_motdepass.value) {message+="'Le champ Mot de passe et le champ Confirmez le mot de passe doivent \u00eatre identiques';";}
		
	if (message!="") 
	{
		alert (message);
	}
	else 
	{
		document.Formulaire_nvadmin.submit();
	}
}
	
//fonction de vérification du formulaire
function verifFormcat() 
{ var message = ""; 

	if ( document.Ajout_categorie.nom_cat.value == "" ) { message += "- un nom !\n";} 

}


//fonction de vérification du formulaire
function verifFormPA() 
{ var message = ""; 


	if ( document.Formulaire.email.value == "" ) { message += "- Veuillez mettre votre email !\n";} 
	if ( document.Formulaire.motdepass.value == "" ) { message += "- Veuillez mettre votre mot de passe !\n";} 
	
		if (message!="") 
	{
		alert (message);
	}
	else 
	{
		document.Formulaire.submit();
	}

}
////supprimer un admin
function supprAdmin()
{ var message = ""; 

	if ( document.Formulaire_supprad.nom_admin.value == "" ) { message += "- Veuillez entrer le nom de l'admin !\n";}
	if ( document.Formulaire_supprad.email_admin.value == "" ) { message += "- Veuillez mettre l'email de l'admin !\n";} 
		if (message!="") 
	{
		alert (message);
	}
	else 
	{
		document.Formulaire_supprad.submit();
	}

}
/////supprimer un producteur
function supprProd()
{ var message = ""; 

	if ( document.Formulaire_supprprod.nom_producteur.value == "" ) { message += "- Veuillez entrer le nom du producteur !\n";}
	if ( document.Formulaire_supprprod.email_producteur.value == "" ) { message += "- Veuillez mettre l'email du producteur !\n";} 
		if (message!="") 
	{
		alert (message);
	}
	else 
	{
		document.Formulaire_supprprod.submit();
	}

}