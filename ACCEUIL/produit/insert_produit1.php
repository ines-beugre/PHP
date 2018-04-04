<?php

include_once '../fonctions.php'; 
//include '../producteur/accueil_producteur.php';
//include_once '../PFE1/producteur/verif_prod.php';

//on recupère la variable de connection à la base de données
$bdd = getBDD();


if ( issetNotEmpty($_POST['id_cat']) && issetNotEmpty($_POST['nom_produit']) && issetNotEmpty($_POST['prix_produit']) && issetNotEmpty($_POST['description_produit'])) 
{
		//recuperation des variables
		$id_cat=$_POST['id_cat'];
 		$nom_produit=$_POST['nom_produit'];
		$prix_produit=$_POST['prix_produit'];
 		$description_produit=$_POST['description_produit'];
		//$id_producteur=$_POST['id_producteur'];
		//$photo_produit=$_POST['photo_produit'];
		$_SESSION['id_producteur'];
				
		//procedure de transfere des photos
		$nom='upload_produit/'.$id_cat.'_'.$_SESSION['id_producteur'].'.jpeg';
		if (upload ('photo_produit', $nom, 1048576, array ('png','gif','jpg','jpeg')))
		{
			//requete d'enregistrement
			$newproduit="INSERT INTO produit VALUES('','".$nom_produit."','".$prix_produit."','".$id_cat."', '".$_SESSION['id_producteur']."','".$description_produit."', '$nom')";
			$resultat=$bdd->exec($newproduit);
			if (($resultat)!==false)
			{
				echo 'F&eacute;licitation, votre produit a &eacute;t&eacute; bien ajout&eacute; sur le site <br />';
				echo '<a href="../produit/ajout_produit.php">Ajouter un produit</a> <br />';
			}
			else 
			{
				echo 'Problème survenu pendant l\'ajout du produit, veuillez recommencer s\'il vous plait <br />';
				echo '<a href="../produit/ajout_produit.php">Ajouter un produit</a> <br />';
			}
		}
		else 
		{
				echo 'souci pendant le upload';
				echo '<a href="../produit/ajout_produit.php">Ajouter un produit</a> <br />';
		}
}
else 
{
	echo 'Remplissez correctement les champs, souci pendant l\'enregistrement';
}	


?>

