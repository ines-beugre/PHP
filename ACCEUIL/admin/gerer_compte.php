<?php
	
include_once '../fonctions.php'; 
$bdd = getBDD();
//on demarre la session, étape indispensable
//session_start(); //a adapter


			// On teste pour voir si nos variables ont bien été enregistrées
//	echo 'Bienvenue '.$_SESSION['email_client'].' sur votre compte!<br />'; //faire de telle sorte que ça soit le prenom qui s'affiche
	
	echo 'Vous &ecirc;tes connect&eacute; en tant que <b><i>'.$_SESSION['prenom_admin'].' </i></b>sur votre compte admin!<br />'; //faire de telle sorte que ça soit le prenom qui s'affiche
		
	echo '<i> Vous souhaitez: <br />';
	
	echo '<p/>';
	
	echo '<a href="gerer_compte.php">Gerer les comptes</a> <br />';
		
		//echo"<ul> <li> <a href='ajout_admin.php'> Afficher la liste des administrateurs </a> </li> ";
		echo"<ul><li> <a href='liste_producteur.php'> Afficher la liste des producteurs</a> </li>";
		echo"<li> <a href='../producteur/form_nvprod.php'> Ajouter un nouveau producteur </a> </li> ";
		echo"<li> <a href='Form_suppr_prod.php'> Supprimer un producteur </a> </li> ";
		//echo"<li> <a href='Form_suppr_prod1.php'> Supprimer un producteur </a> </li> ";
		echo" <li> <a href='ajout_admin.php'> Enregistrer un nouvel administrateur </a> </li> ";
		echo"<li> <a href='Form_suppr_admin1.php'> Supprimer un administrateur </a> </li> </ul>";
	
		
			
	echo '<a href="gerer_categorie.php">Gerer les cat&eacute;gories</a> <br />';
		
//	echo '<a href="modifcoord.php" target="_blank">Modifier vos coordonn&eacute;es</a> <br />';
	
		
	// On affiche un lien pour fermer la session session du client
	echo '<a href="../producteur/deconnect_prod.php">D&eacute;connexion</a><br />';
	
	echo '<a href="../index.html">Accueil</a> <br />';

?>