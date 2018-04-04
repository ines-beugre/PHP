<?php
include_once '../fonctions.php'; 
$bdd = getBDD();
//on demarre la session, étape indispensable
//session_start(); //a adapter


	echo 'Vous &ecirc;tes connect&eacute; en tant que <b><i>'.$_SESSION['prenom_admin'].' </i></b>sur votre compte admin!<br />'; //faire de telle sorte que ça soit le prenom qui s'affiche
	echo '<br/>';
	echo '<a href="gerer_compte.php">Retour</a><br/>';
	echo '<p/>';

	echo '<p>';
	echo '<a href="Form_suppr_prod.php">Supprimer un producteur</a> <br/>';
	echo '<p/>';
	
?>

<html>
<head><title></title>

</head>
<body>

<table width="400" border="1">

	<tr><form name="Formulaire_supprprod" action="suppr_prod.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
		<td><center><strong>Supprimer un producteur</strong></center><br/>
			<table width="100%" border="0">
						
				<tr>
					<td>
						<input id="nom_producteur" class="form-texte required" placeholder="Nom*" name="nom_producteur" value="" size="60" maxlength="60" type="text">
					</td>
				</tr>
				
				<tr>
					<td>
						<input id="email_producteur" class="form-texte required" placeholder="Email*" name="email_producteur" value="" size="60" maxlength="60" type="text">
					</td>
				</tr>
				
				<tr>
					<td colspan="2">
						<center><button id="edit-submit" class="btn form-submit" type="button" name="supprimer" onCLick="supprProd();" value="Supprimer">Supprimer</button></center>
					</td>
				
				</tr>
			
			</table>
		</td>
	</form>		
	</tr>
</table>



<script type="text/javascript" src="../producteur/verifForm.js"></script>

</body>
</html>

<?php
	echo '<p/>';
	echo '<a href="gerer_categorie.php">Gerer les cat&eacute;gories</a> | ';
	echo '<a href="gerer_compte.php">Gerer les comptes</a> | ';
	//echo '<a href="modifcoord.php">Modifier vos coordonn&eacute;es</a> | ';	
	// On affiche un lien pour fermer la session session du client
	echo '<a href="../producteur/deconnect_prod.php">D&eacute;connexion</a>';
?>

