<?php
include '../fonctions.php';

//on recupère la variable de connection à la base de données
$bdd = getBDD();


	//on verifie que tous les champs obligatoire du formulaire ont été remplis
	if (issetNotEmpty($_POST['id_cat'])) 
	{
		// Declaration puis on recupère les données de POST du formulaire
		$id_cat = $_POST['id_cat'];
		
		//on prepare la requete
		$req= $bdd -> prepare ("SELECT nom_cat FROM categorie WHERE id_cat='".$_POST['id_cat']."'");
		$req -> bindParam(':id_cat', $id_cat);
		$req -> execute(); 
		
		//si la categorie existe vraiment 
		if ($req -> rowCount() ==1)
		{
			//procedure de suppression de la categorie dans la bdd
				// requete de suppression 
				$supprCat = $bdd -> prepare ('DELETE FROM categorie WHERE id_cat="'.$id_cat.'"');
				$supprCat -> bindParam (':id_cat', $id_cat);
				$resultat = $supprCat -> execute(); 
							
				if ($resultat == true)
				{
					$supprCat_prod = $bdd -> prepare ('DELETE FROM produit WHERE id_cat="'.$id_cat.'"');
					$supprCat_prod -> bindParam (':id_cat', $id_cat);
					$resultat_prod = $supprCat_prod -> execute(); 
					
					if ($resultat_prod ==true)
					{
						echo 'Vous avez supprim&eacute; la cat&eacute;gorie <b>'.$id_cat.' <b/><br/>'; 
						echo '<a href="gerer_categorie.php">Gerer les cat&eacute;gories</a> <br />';
					}
					else 
					{
					echo 'Probl&egraveme; survenu lors de la suppression d\une cat&eacute;gorie dans la table produit <br />';
					echo '<a href="Form_suppr_cat.php">Recommencer</a> <br />';
					}
				}
				else
				{
					echo 'Probl&egraveme; survenu lors de la suppression d\une cat&eacute;gorie <br />';
					echo '<a href="Form_suppr_cat.php">Recommencer</a> <br />';
				}
		}// fin si categorie existe vraiment 
		else 
		{
			echo 'La cat&eacute;gorie n\'existe pas <br />';
			echo '<a href="gerer_categorie.php">Gerer les cat&eacute;gories</a> <br />';
		}
	}	
	else 
	{
		echo 'Choisissez la cat&eacute;gorie';
	}	
?>
	