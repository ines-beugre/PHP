<?php
	//connexion à la bdd bulle_patissiere ordinateur asus
	
include_once '../fonctions.php'; 
$bdd = getBDD();
//on demarre la session, étape indispensable
//session_start(); //a adapter


			// On teste pour voir si nos variables ont bien été enregistrées
//	echo 'Bienvenue '.$_SESSION['email_client'].' sur votre compte!<br />'; //faire de telle sorte que ça soit le prenom qui s'affiche
	
	echo 'Bienvenue <b><i>'.$_SESSION['prenom_admin'].' </i></b>sur votre compte admin!<br />'; //faire de telle sorte que ça soit le prenom qui s'affiche
	
	echo '<i> Vous souhaitez: <br />';
	
	echo '<p/>';
	
	echo '<a href="gerer_compte.php" target="_blank">Gerer les comptes</a> <br />';
	
	echo'<p>';
	echo '<a href="gerer_categorie.php">Gerer les cat&eacute;gories</a> <br />';
	
	
		//echo '<ul><li><a href="ajout_categorie.php">Cr&eacute;er une nouvelle cat&eacute;gorie</a> </li>';
		echo '<ul><li><a href="Form_categorie1.php">Cr&eacute;er une nouvelle cat&eacute;gorie</a> </li>';
		echo '<li><a href="modif_categorie.php">Modifier une cat&eacute;gorie</a></li>';
		echo '<li><a href="Form_suppr_cat.php">Supprimer une cat&eacute;gorie</a></li></ul>';
		echo '<a href="../index.html">Accueil</a> <br />';
	// On affiche un lien pour fermer la session session du client
	echo '<a href="../producteur/deconnect_prod.php">D&eacute;connexion</a>';
?>

