<DOCTYPE html>
<html lang='fr'>
<head>
	<title>Formulaire nouveau client</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" enctype="multipart/form-data" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
		
	<link rel="stylesheet" type="text/css" href="../style.css" />
	
	<script language="Javascript">
		function limiter(){
			maximum=100;
			champ=document.Formulaire_nvprod.presentation; // le_nom_du_formulaire.le_nom_du_champ
			indic=document.Formulaire_nvprod.indicateur; //le_nom_du_formulaire.le_name_du_<input>
			
			  if (champ.value.length > maximum)
			champ.value = champ.value.substring(0, maximum);
			else 
			indic.value = maximum - champ.value.length;
		}
	</script>
<?php
include_once '../fonctions.php'; 
$bdd = getBDD();
/*					
		if ($_SESSION['type_pers']==1) 
		{
			echo 'Vous &ecirc;tes connect&eacute; en tant que <b><i>'.$_SESSION['prenom_admin'].' </i></b>sur votre compte admin!<br />';
		}
*/		

?>
</head>	
<body>

	<div id="banner1"> PRES DE CHEZ VOUS	</div>
	<div id="menu"></div>
		
		<h1>Bienvenue sur votre espace <b>Producteur<b/></h1><br/>
		<h3>Créer votre compte</h3>

<center>
<table width="400" border="1">
	<tr><form name="Formulaire_nvprod" action="insert_nvprod.php" method="POST" accept-charset="UTF-8" autocomplete="on" enctype="multipart/form-data" onsubmit="return verifForm(this)">
		<td>
			<table width="100%" border="0">
				<tr><strong> <center>Nouveau producteur<center></strong>
					<td>
						<input id="nom_producteur" class="form-texte required" placeholder="Nom*" name="nom_producteur" value="" size="60" maxlength="60" type="text">
					</td>
				</tr>
				<tr>
					<td>
						<input id="prenom_producteur" class="form-texte required" placeholder="Pr&eacute;nom*" name="prenom_producteur" value="" size="60" maxlength="60" type="text">
					</td>
				</tr>
				<tr>
					<td>
						<input id="telephone_producteur" class="form-texte required" placeholder="Numéro de téléphone*" name="telephone_producteur"  pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" size="60" maxlength="60" type="tel">
					</td>
				</tr>	
				<tr>
					<td>
						<span onClick="alert('le champ adresse doit comporter: le numero et le nom de la rue, la ville et le pays.\nEx: 5 rue Victor Duruy, Creil, France')">
						<i>Votre adresse (i)</i>
						</span>							
					</td>
				</tr>
				<tr>
					<td>
						<input id="adresse_producteur" class="form-texte required" placeholder="Adresse* ex. 33 avenue du professeur Charles Foulon, Rennes, France" name="adresse_producteur" value="" size="60" maxlength="60" type="text">
					</td>
				</tr>
				<tr>
					<td>
						<input id="codepost_producteur" class="form-texte required" placeholder="Code postale*" name="codepost_producteur" value="" size="60" maxlength="60" type="text">
					</td>
				</tr>	
				
				<tr>
					<td>
						<input id="email_producteur" class="form-texte required" placeholder="Email*" name="email_producteur" value="" size="60" maxlength="60" type="text">
					</td>
				</tr>				
				<tr>
					<td>
						<input id="motdepass" class="form-texte required" placeholder="Mot de passe (4 caract&egrave;res minimum)*" name="motdepass" pattern=".{4,}" required title="4 caractères minimum" value="" size="60" maxlength="60" type="password" >
					</td>
				</tr>	
				
				<tr>
					<td>
						<input id="conf_motdepass" class="form-texte required" placeholder="Confirmer le mot de passe*" name="conf_motdepass" value="" size="60" maxlength="60" type="password">
					</td>
				</tr>
				
				<tr>
					<td>
						Je souhaite que mon adresse soit visible sur le site 
						<input type="radio" name="affichecontact" value="oui" name="oui" required>Oui
						<input type="radio" name="affichecontact" value="non" name="non" required>Non
					</td>
				</tr>
				<tr>
					<td>
						Ajouter une photo (JPG, PNG ou GIF |max. 1Mo)
						<input type="hidden" name="max_file_size" value="1048576" />
						<input type="file" name="photo_producteur" id="photo_producteur" required> 
					</td>		
				</tr>
				<tr>
					<td>
					<textarea id="presentation" class="form-texte required" placeholder="Presentez-vous...*" name="presentation" cols="50" rows="5" onKeyDown="limiter();" onKeyUp="limiter();" ></textarea><br />
					<i>Il vous reste <input readonly type=text name="indicateur" size="1" maxlength=3 value="100">caract&egrave;res</i>
					</td>
				</tr>	
				
				<tr>
					<td colspan="2">
						<center><button id="edit-submit" class="btn form-submit" type="button" name="inscr_nvclient" onCLick="verifForm();" value="S'inscrire">S'inscrire</button></center>
					</td>
				</tr>
				<tr>
					<td>
						<span onClick="('Votre mot de passe doit respecter la synthaxe suivante: au moins un caract\u00e8re majuscule, des caract\u00e8res minuscules, des chiffres et des caract\u00e8res sp\u00e9ciaux.')"><i>(i)Syntaxe du mot de passe</i></span>			
					</td>
				</tr>
			</table>
		</td>
	</form>
	</tr>
</table>
</center>
<br/>

<script type="text/javascript" src="verifForm.js"></script>
<div id="footer">
			<a href="../index.html">Accueil</a>  | <a href="mentionslegales.html">Mentions légales</a>  |  <a href="contact.html">Nous contacter</a>
</div>
</body>
</html>