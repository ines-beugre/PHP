<html>
<head><title></title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" enctype="multipart/form-data" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
		
	<link rel="stylesheet" type="text/css" href="../style.css" />

</head>

<div id="banner1"> PRES DE CHEZ VOUS	</div>
	<div id="menu"></div>

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

<!------------------------------------->
<?php
//on demarre la session, étape indispensable
include_once '../fonctions.php'; 
$bdd = getBDD();

	echo '<h4>Vous &ecirc;tes conntect&eacute; en tant que <b><i>'.$_SESSION['prenom_producteur'].' </i></b>sur votre compte Producteur</h4>'; //faire de telle sorte que ça soit le prenom qui s'affiche
	echo '<a href="../producteur/accueil_producteur.php">Votre page d\'accueil</a>';
	echo '<br/>';
?>
<br/>
<!------------------------------------->


<table width="400" border="1">

	<tr><form name="Formulaire_modifcoord" action="insert_modif.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
		<td><center><strong>Mes coordonn&eacute;es</strong></center><br/>
			<table width="100%" border="0">
				
				<tr>
					<td><center>
						<img src="<?php echo $_SESSION['photo_producteur']; ?>" alt="Image introuvable" height="150" width="150"> 
						</center>
					</td>
				</tr>
				
				<tr>
					<td>
						<input id="nom_producteur" class="form-texte required" placeholder="Nom*" name="nom_producteur" value="<?php echo $_SESSION['nom_producteur'];?>" size="60" maxlength="60" type="text">
					</td>
				</tr>
				
				<tr>
					<td>
						<input id="prenom_producteur" class="form-texte required" placeholder="Pr&eacute;nom*" name="prenom_producteur" value="<?php echo $_SESSION['prenom_producteur']; ?>" size="60" maxlength="60" type="text">
					</td>
				</tr>
				
				<tr>
					<td>
						<input id="telephone_producteur" class="form-texte required" placeholder="Telephone*" name="telephone_producteur" value="<?php echo $_SESSION['telephone_producteur']; ?>" size="60" maxlength="60" type="tel">
					</td>
					
				<tr>
					<td>
						<input id="adresse_producteur" class="form-texte required" placeholder="Adresse*" name="adresse_producteur" value="<?php echo $_SESSION['adresse_producteur'] ;?>" size="60" maxlength="60" type="text">
					</td>
				</tr>
				
				<tr>
					<td>
						<input id="codepost_producteur" class="form-texte required" placeholder="Code post.*" name="codepost_producteur" value="<?php echo $_SESSION['codepost'] ?>" size="60" maxlength="60" type="text">
					</td>
				</tr>
				
				<tr>
					<td>
						<input id="_email_producteur" class="form-texte required" placeholder="Nom*" name="email_producteur" value="<?php echo $_SESSION['email_producteur'];?>" size="60" maxlength="60" type="text">
					</td>
				</tr>
				<!--			
				<tr>
					<td>
						<input id="motdepass" class="form-texte required" placeholder="Mot de passe (4 caract&egrave;res minimum)*" name="motdepass" pattern=".{4,}" required title="4 caractères minimum" value="<?php echo $_SESSION['motdepass'] ?>" size="60" maxlength="60" type="password" >
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
						<input type="hidden" name="max_file_size" value="<?php echo $_SESSION['photo_producteur'];?>" />
						<input type="file" name="photo_producteur" id="photo_producteur" required> 
					</td>		
				</tr>
				<tr>
					<td>
					<textarea id="presentation" class="form-texte required" placeholder="Presentez-vous...*"  name="presentation"  cols="50" rows="5" onKeyDown="limiter();" onKeyUp="limiter();" ></textarea><br />
					<i>Il vous reste <input readonly type=text name="indicateur" size="1" maxlength=3 value="100">caract&egrave;res</i>
					</td>
				</tr>	
				
				<tr>
					<td>
						<span onClick="alert('Votre mot de passe doit respecter la synthaxe suivante: au moins un caractère majuscule, des caractères minuscules, des chiffres et des caractères spéciaux.')"><i>(i)Syntaxe du mot de passe</i></span>			
					</td>
				</tr>
				-->
				<!--
				<tr>
					<td colspan="2">
						<center><button id="edit-submit" class="btn form-submit" type="button" name="modif_coord" onCLick="verifModifProd();" value="S'inscrire">Modifier</button></center>
					</td>
				</tr>
				-->
			
			</table>
		</td>
	</form>		
	</tr>
</table>
<br/>
<script type="text/javascript" src="verifForm.js"></script>

</body>
</html>

<?php
echo '<a href="../producteur/deconnect_prod.php">D&eacute;connexion</a>';
?>