<?php
//inclure le fichier function pour la connexion a la BDD et isset&empty
//include_once '../fonctions.php';
include '../fonctions.php';

//on recupère la variable de connection à la base de données
$bdd = getBDD();

	//on verifie que tous les champs obligatoire du formulaire ont été remplis
	
	if (issetNotEmpty($_POST['nom_producteur']) && 
		issetNotEmpty($_POST['email_producteur']) )
	{
		//declaration des variables
		$nom_producteur=$_POST['nom_producteur'];
		$email_producteur=$_POST['email_producteur'];	
			//si l'email est valide
		if (filter_var($email_producteur, FILTER_VALIDATE_EMAIL)) 
		{
				//Preparation et  execution de la requete qui permet de selectionner l'email si elle existe deja dans la base de donnees
			$req=$bdd->prepare("SELECT * FROM producteur WHERE email_producteur='".$email_producteur."'");
			$req -> execute(array ($email_producteur));
			$resultreq = $req -> fetch ();
			$nb = $req -> rowCount();
			//echo $nb;
			
			// si l'email existe dans la base de données
			if ($nb == true)
			{
				/*On recupère en session les données du producteur concernées*/
					$_SESSION['id_producteur']=$resultreq ['id_producteur'];
					$_SESSION['nom_producteur']=$resultreq ['nom_producteur'];
					$_SESSION['email_producteur']=$resultreq ['email_producteur'];
				/**/
				/*Puis on fait la requete de la suppression des produits du producteur dans la table produit */
					$suppr_produit = $bdd -> prepare ('DELETE FROM produit WHERE id_producteur="'.$_SESSION['id_producteur'].'"');
					$suppr_produit -> bindParam ('id_producteur', $_SESSION['id_producteur']);
					$result_produit = $suppr_produit -> execute();		
				/**/
				/*Puis on le supprime dans la table producteur*/
				if ($result_produit == true)
				{
					//Preparation et  execution de la requete de suppression du producteur dans la table produit
					$supprProd=$bdd->prepare('DELETE FROM producteur WHERE email_producteur="'.$email_producteur.'"');
					$supprProd -> bindParam (':email_producteur', $email_producteur);
					$resultatProd = $supprProd-> execute() ;
				}
					if ($resultatProd == true)
					{
						echo 'Vous avez supprim&eacute; le compte du producteur <b>'.$nom_producteur.'</b> ayant pour email <i>'.$email_producteur.' </i> du site <br/>';
						echo '<a href="liste_producteur.php">Retour</a> <br/>';
					}
				else
				{
					echo 'Probl&egraveme; survenu lors de la suppression d\un compte producteur <br/>';
					echo '<a href="liste_producteur.php">Retour</a> <br/>';
				}
			}
			else
			{
				echo 'L\'email n\'existe pas <br/>';
				echo '<a href="liste_producteur.php">Retour</a> <br/>';
			}
		}
		else
		{
			echo 'L\'email n\'est pas valide <br/>';
			echo '<a href="liste_producteur.php">Retour</a> <br/>';
		}
	}
	else
	{
		echo 'Remplissez tous les champs <br/>';
		echo '<a href="liste_producteur.php">Retour</a> <br/>';
	}
?>