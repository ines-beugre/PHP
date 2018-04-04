<?php
include '../fonctions.php';

//on recupère la variable de connection à la base de données
$bdd = getBDD();


	//on verifie que tous les champs obligatoire du formulaire ont été remplis
	if (issetNotEmpty($_POST['id_cat'])  && issetNotEmpty($_POST['nom_modif'])) //&& issetNotEmpty($_POST['nom_cat'])
	{
		//on recupère les données de POST du formulaire
		$id_cat = $_POST['id_cat'];
		//$nom_cat =  $_POST['nom_cat'];
		$nom_modif = $_POST['nom_modif'];
		
		
		//on prepare la requete
		$req= $bdd -> prepare ("SELECT nom_cat FROM categorie WHERE id_cat='".$_POST['id_cat']."'");
		//$resultat=$req->fecth();
		$req -> bindParam (':id_cat', $id_cat);
		$req -> execute();
		
		//si l'id_cat existe dans le formulaire 
		if ($req -> rowCount() == 1)
		{
			//$_SESSION['nom_cat']=$resultat['nom_cat'];
			$nom='upload_categorie/'.$id_cat.'.jpeg';
			//var_dump($_FILES['photo_cat']) ["error"]; //affiche l'objet que je passe en paramètres
			//recuperer la photo
			if (upload ('photo_cat', $nom, 1048576, array ('png','gif','jpg','jpeg')))
			{
				//processus de suppression
					//requete par une requete preparée
				$modifCat = $bdd -> prepare ('UPDATE categorie SET nom_cat="'.$nom_modif.'" WHERE id_cat= "'.$id_cat.'"');
				$modifCat -> bindParam (':nom_cat', $nom_modif);
			
				$resultat = $modifCat -> execute();
			
				if ($resultat == true)
				{
					echo 'Vous venez de modifier la cat&eacute;gorie '.$id_cat.'<br/>';
				}
				else 
				{
					echo 'La cat&eacute;gorie n\'a pas &eacute;t&eacute; modifi&eacute;';
				}
			}
			else 
			{
			echo 'Souci pendant l\'upload';
			}
		}
		else 
		{
			echo 'La cat&eacute;gorie n\'existe pas';
		}
	}
	else
	{
		echo 'Champ vide';
	}
		
?>
	