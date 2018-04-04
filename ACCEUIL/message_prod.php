<?php
session_start();
	$idproduit = "";
		
if (isset($_GET['idprod'])){

		 $_SESSION['idprod']= $_GET['idprod'];
		 
}


?>
<html>
	<head>	
		<meta charset="utf-8"/>

		<title>LAISSER UN COMMENTAIRE</title>
		
		<link rel="stylesheet" type="text/css" href="style2.css" />
<script type="text/javascript"> 

	function limiter(){
			maximum=254;
			champ=document.form.message; // le_nom_du_formulaire.le_nom_du_champ
			indic=document.form.indicateur; //le_nom_du_formulaire.le_name_du_<input>
			
			  if (champ.value.length > maximum)
			champ.value = champ.value.substring(0, maximum);
			else 
			indic.value = maximum - champ.value.length;
		}

	function VerifMail() { 
		a = document.form.email_conso.value; valide1 = false; 
	for(var j=1;j<(a.length);j++){ if(a.charAt(j)=='@')
			{ if(j<(a.length-4))
				{ for(var k=j;k<(a.length-2);k++){ if(a.charAt(k)=='.') valide1=true; }
				 } } 
				} 
		if(valide1==false) 
				 	{alert("Veuillez saisir une adresse email valide.");  
				 	window.location.href="message_prod.php";
				 	return valide1;
				 }

		if(document.form.message=""){
			alert("Entrez un commentaire sur le produit!");
			window.location.href="message_prod.php";
	}

		for(i=0; i<document.form.noteA.length; i++){
			if(document.form.noteA[i].checked==false){
				alert("Vous devez choisir une note pour le produit!"+document.form.noteA.length);
				window.location.href="message_prod.php";
			}
		}
	} 

</script>

</head>
<body>
	 <div id="banner1"> PRES DE CHEZ VOUS </div>

<p><h3><u>LAISSER UN COMMENTAIRE</u></h3></p>

<center>
<table>
		
<form method="POST" name= "form" action="message_prod2.php">
<div>
	<tr>
		<td class="avis"><b>Entrez vos Noms et prénoms </b></td>
		<td><input class="controle" type="text" name="nom_conso" class="form-texte required" required placeholder="Saisissez vos noms et prénoms"/></br>
			 <span class="resultat"></span>
		</td>
	</tr>
</div>
<div>
	<tr>
		<td class="avis">	<b>Entrez une adresse mail valide* : </b>	</td>
		<td>	<input class="controle" type="text" name="email_conso" value="" class="form-texte required" required placeholder="Ex: dupont@votredomain.xy" size="30"/></br>	
			 <span class="resultat"></span>
		</td>
	</tr>
</div>
<div>
	<tr>
		<td colspan="2"><i>*Votre adresse email ne sera visible que par les administrateurs</i></td>
	</tr>
</div>
<div>
	<tr>
		<td colspan="2">	<b>Commentaire:</b>	</td>
	
	</tr>
</div>
<div>
	<tr>
		<td colspan="2">
			<textarea name="message" rows="5" cols="60" value="" class="form-texte required" required placeholder="Saisissez votre message ici!" onKeyDown="limiter();" onKeyUp="limiter();"></textarea></br></br>
		 		<span class="resultat"></span>
			<i>Il vous reste <input readonly type=text name="indicateur" size="1" maxlength=3 value="254">caract&egrave;res</i></br>
		</td>
	</tr>

</div>
<div>
<tr>

	<td class="avis" colspan="2">
		<b>Sélectionez une note pour le produit :</b>
<ul class="notes-echelle">
	<li>
		<label for="note01" title="Note&nbsp;: 1 sur 5">1</label>
		<input type="radio" name="notesA" id="note01" value="1" />
	</li>
	<li>
		<label for="note02" title="Note&nbsp;: 2 sur 5">2</label>
		<input type="radio" name="notesA" id="note02" value="2" />
	</li>
	<li>
		<label for="note03" title="Note&nbsp;: 3 sur 5">3</label>
		<input type="radio" name="notesA" id="note03" value="3" />
	</li>
	<li>
		<label for="note04" title="Note&nbsp;: 4 sur 5">4</label>
		<input type="radio" name="notesA" id="note03" value="3" />
	</li>
	<li>
		<label for="note05" title="Note&nbsp;: 5 sur 5">5</label>
		<input type="radio" name="notesA" id="note03" value="3" />
	</li>
</ul>
	</td>

</tr>

</div>

<tr>
	<td colspan="2">
		<input type="submit" onClick="VerifMail();" value="Envoyer"/></br>
	</td>
</tr>

</form>
*Tous les champs sont obligatoires
</table>
</center></br>

<center><a href="message_prod2.php">Voir les commentaires de précédents consommateurs</a></center>
<a href="list_prod2.php">Retour</a>

<div id="footer">
      <a href="index.html">Accueil</a>  | <a href="mentionslegales.html">Mentions légales</a>  |  <a href="contact.html">Nous contacter</a>
    </div>

</body>
</html>