
<html>
<head><title></title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" enctype="multipart/form-data" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
		
	<link rel="stylesheet" type="text/css" href="../style.css" />

</head>

<div id="banner1"> PRES DE CHEZ VOUS	</div>
	<div id="menu"></div>
		
<body>

<?php
//on demarre la session, étape indispensable
include_once '../fonctions.php'; 
$bdd = getBDD();

	echo '<h1>Bienvenue <b><i>'.$_SESSION['prenom_producteur'].' </i></b>sur votre compte!</h1><br/>'; //faire de telle sorte que ça soit le prenom qui s'affiche
?>


<table width="" border="1">
	<tr>
		<td><center>
			<img src="<?php echo $_SESSION['photo_producteur']; ?>" alt="Image introuvable" height="150" width="150"> 
				</center>
		</td>
	</tr>
	
</table>
<br/>
<br/>
</body>
</html>

<?php	
	echo '<i> Vous souhaitez: <br />';
	echo '<a href="../produit/ajout_produit.php">Ajouter un produit</a> <br/>';
	/*
	echo '<a href="listedesproduits.php">Voir la liste de mes produits</a> <br/>'; */
	
	echo '<a href="modifcoord.php">Voir mes coordonn&eacute;es</a> <br/>';
	
	// On affiche un lien pour fermer la session session du client
	echo '<a href="deconnect_prod.php">D&eacute;connexion</a><br/>';
	echo '<br/>';
	echo '<a href="../index.html">Accueil</a>';

?>