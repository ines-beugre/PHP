<html>
	<head>
		<title>MENU</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../style.css" />
	</head>

	<body>
		<div id="banner1"> PRES DE CHEZ VOUS	</div>
	</body>
</html>


<?php

include_once '../fonctions.php'; 
$bdd = getBDD();
	
	echo '<h1>Bienvenue <b><i>'.$_SESSION['prenom_admin'].' </i></b>sur votre compte admin!<br/></h1>'; //faire de telle sorte que ça soit le prenom qui s'affiche
	
	
	echo '<i> Vous souhaitez: <br />';
	echo '<a href="gerer_compte.php">Gerer les comptes</a> <br />';
	echo '<a href="gerer_categorie.php">Gerer les cat&eacute;gories</a> <br />';
	//echo '<a href="modifcoord.php">Modifier vos coordonn&eacute;es</a> <br />';
	
		
	// On affiche un lien pour fermer la session session du client
	echo '<a href="../producteur/deconnect_prod.php">D&eacute;connexion</a><br />';
	echo '</br>';
	echo '<a href="../index.html">Accueil</a> <br />';

?>