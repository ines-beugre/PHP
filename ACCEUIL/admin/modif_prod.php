<?php
include_once '../fonctions.php'; 
$bdd = getBDD();
//on demarre la session, étape indispensable
//session_start(); //a adapter


			// On teste pour voir si nos variables ont bien été enregistrées
//	echo 'Bienvenue '.$_SESSION['email_client'].' sur votre compte!<br />'; //faire de telle sorte que ça soit le prenom qui s'affiche
	
	echo 'Bienvenue <b><i>'.$_SESSION['prenom_admin'].' </i></b>sur votre compte admin!<br />'; //faire de telle sorte que ça soit le prenom qui s'affiche
	echo '<br/>';
	echo '<a href="gerer_compte.php">Retour</a><br/>';
	echo '<p/>';

	echo '<p>';
		echo '<a href="modif_prod.php">Modifier le compte d\'un producteur</a> <br/>';
	echo '<p/>';
?>

<html>
<head><title></title>

	<script language="Javascript">
		function limiter1(){
			maximum=50;
			champ=document.Formulaire_ajoutproduit.description_produit; // le_nom_du_formulaire.le_nom_du_champ
			indic=document.Formulaire_ajoutproduit.indicateur; //le_nom_du_formulaire.le_name_du_<input>
			
			  if (champ.value.length > maximum)
			champ.value = champ.value.substring(0, maximum);
			else 
			indic.value = maximum - champ.value.length;
		}
		
	</script>

</head>
<body>

<table width="400" border="1">

	<tr><form name="Formulaire_modifProd" action="insert_modif_prod.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
		<td><center><strong>Modifier le compte d'un producteur</strong></center><br/>
			<table width="100%" border="0">
			
				
				<tr>
					<td>
						<input id="nom_producteur" class="form-texte" placeholder="Nom*" name="nom_producteur" value="" size="60" maxlength="60" type="text">
					</td>
				</tr>
				<!--
				<tr>
					<td>
						<input id="prenom_producteur" class="form-texte" placeholder="Pr&eacute;nom*" name="prenom_producteur" value="" size="60" maxlength="60" type="text">
					</td>
				</tr>
				
				<tr>
					<td>
						<input id="telephone_producteur" class="form-texte" placeholder="Telephone*" name="telephone_producteur" value="" size="60" maxlength="60" type="tel">
					</td>
					
				<tr>
					<td>
						<input id="adresse_producteur" class="form-texte" placeholder="Adresse*" name="adresse_producteur" value="" size="60" maxlength="60" type="text">
					</td>
				</tr>
				
				<tr>
					<td>
						<input id="codepost_producteur" class="form-texte" placeholder="Code post.*" name="codepost_producteur" value="" size="60" maxlength="60" type="text">
					</td>
				</tr>
				-->
				<tr>
					<td>
						<input id="email_producteur" class="form-texte" placeholder="Email*" name="email_producteur" value="" size="60" maxlength="60" type="text">
					</td>
				</tr>
				
				<tr>
					<td>
						<input id="motdepass" class="form-texte" placeholder="Mot de passe (6 caract&egrave;res minimum)*" name="motdepass" pattern=".{6,}" required title="6 caractères minimum" value="" size="60" maxlength="60" type="password" >
					</td>
				</tr>	
				
				<tr>
					<td>
						<input id="conf_motdepass" class="form-texte" placeholder="Confirmer le mot de passe*" name="conf_motdepass" value="" size="60" maxlength="60" type="password">
					</td>
				</tr>		
				
				<tr>
					<td>
						<span onClick="alert('Votre mot de passe doit respecter la synthaxe suivante: au moins un caractère majuscule, des caractères minuscules, des chiffres et des caractères spéciaux.')"><i>(i)Syntaxe du mot de passe</i></span>			
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<center><button id="edit-submit" class="btn form-submit" type="button" name="modifier" onCLick="verifModifProdAd();" value="Modifier">Modifier</button></center>
					</td>
				
				</tr>
			
				<!--
				<tr>
					<td colspan="2">
						<center><input type="submit" id="edit-submit" class="btn form-submit" name="modif_coord" value="Modifier"></input></center>
					</td>
				
				</tr>
				-->
			</table>
		</td>
	</form>		
	</tr>
</table>

<script type="text/javascript" src="../producteur/verifForm.js"></script>

</body>
</html>

<?php
	echo '<p>';
	echo '<a href="suppr_prod.php">Supprimer un producteur</a> <br/>';
	echo '<p/>';
	
	
	echo '<a href="gerer_categorie.php">Gerer les cat&eacute;gories</a> | ';
	echo '<a href="gerer_compte.php">Gerer les comptes</a> | ';
	echo '<a href="modifcoord.php">Modifier vos coordonn&eacute;es</a> | ';	
	// On affiche un lien pour fermer la session session du client
	echo '<a href="../producteur/deconnect_prod.php">D&eacute;connexion</a>';
?>

