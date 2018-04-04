<?php

include_once '../fonctions.php'; 
$bdd = getBDD();
//on demarre la session, étape indispensable
//session_start(); //a adapter


			// On teste pour voir si nos variables ont bien été enregistrées
//	echo 'Bienvenue '.$_SESSION['email_client'].' sur votre compte!<br />'; //faire de telle sorte que ça soit le prenom qui s'affiche
	
	echo 'Vous &ecirc;tes connect&eacute; en tant que <b><i>'.$_SESSION['prenom_admin'].' </i></b>sur votre compte admin!<br />'; //faire de telle sorte que ça soit le prenom qui s'affiche
	echo '<br/><br/>';
	echo '<a href="gerer_compte.php">Retour</a>';
?>

<DOCTYPE html>
<html lang='fr'>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=" enctype="multipart/form-data" /> 
	<title>Formulaire nouveau admin</title>
</head>	
<body>
<br/>
<br/>

<table width="400" border="1">
	<tr><form name="Formulaire_nvadmin" action="insert_nvadmin.php" method="POST" accept-charset="UTF-8" autocomplete="on" enctype="multipart/form-data" onsubmit="return verifForm(this)">
		<td>
			<table width="100%" border="0">
				<tr><strong> <center>Nouvel admin<center></strong>
					<td>
						<input id="nom_admin" class="form-texte required" placeholder="Nom*" name="nom_admin" value="" size="60" maxlength="60" type="text">
					</td>
				</tr>
				<tr>
					<td>
						<input id="prenom_admin" class="form-texte required" placeholder="Pr&eacute;nom*" name="prenom_admin" value="" size="60" maxlength="60" type="text">
					</td>
				</tr>
				
				<tr>
					<td>
						<input id="email_admin" class="form-texte required" placeholder="Email*" name="email_admin" value="" size="60" maxlength="60" type="text">
					</td>
				</tr>				
				<tr>
					<td>
						<input id="motdepass" class="form-texte required" placeholder="Mot de passe (3 caract&egrave;res minimum)*" name="motdepass" pattern=".{3,}" required title="6 caract&egrave;res minimum" value="" size="60" maxlength="60" type="password" >
					</td>
				</tr>	
				
				<tr>
					<td>
						<input id="conf_motdepass" class="form-texte required" placeholder="Confirmer le mot de passe*" name="conf_motdepass" value="" size="60" maxlength="60" type="password">
					</td>
				</tr>
				
				<tr>
					<td colspan="2">
						<center><button id="edit-submit" class="btn form-submit" type="button" name="inscr_nvclient" onCLick="verifFormadmin();"  value="S'inscrire">S'inscrire</button></center>
					</td>
				</tr>
				<tr>
					<td>
						<span onClick="alert('Votre mot de passe doit respecter la synthaxe suivante: au moins un caract\u00e8re majuscule, des caract\u00e8res minuscules, des chiffres et des caract\u00e8res sp\u00e9ciaux.')"><i>(i)Syntaxe du mot de passe</i></span>			
					</td>
				</tr>
			</table>
		</td>
	</form>
	</tr>
</table>
<!--<script type="text/javascript" src="script.js"></script>--> <!-- script qui permet de signaler en rouge les champs non renseigner -->
<script type="text/javascript" src="../producteur/verifForm.js"></script>
</body>
</html>
<br/>
<br/>
<?php
	
	echo '<a href="gerer_categorie.php">Gerer les cat&eacute;gories</a> | ';
	echo '<a href="gerer_compte.php">Gerer les comptes</a> | ';
	echo '<a href="modifcoord.php">Modifier vos coordonn&eacute;es</a> | ';	
	// On affiche un lien pour fermer la session session du client
	echo '<a href="../producteur/deconnect_prod.php">D&eacute;connexion</a>';
?>