<?php

include '../fonctions.php';

//on recupère la variable de connection à la base de données
$bdd = getBDD();


	//on verifie que tous les champs obligatoire du formulaire ont été remplis
	if (issetNotEmpty($_POST['nom_cat'])) 
	{
		//on prepare la requete
		$req="SELECT nom_cat FROM categorie WHERE nom_cat='".$_POST['nom_cat']."'";
		$result = $bdd -> query ($req);
		
		//var_dump($result);
		
		$result1 = $result-> fetch();
		$nb = $result -> rowCount();
		if ($nb==0)
		{	
			//declaration des variables
			$nom_cat=$_POST['nom_cat'];
		
			//procedure de transfere des photos
			$nom='upload_categorie/'.$nom_cat.'.jpeg';
			//var_dump($_FILES['photo_cat']) ["error"]; //affiche l'objet que je passe en paramètres
			//recuperer la photo
			if (upload ('photo_cat', $nom, 1048576, array ('png','gif','jpg','jpeg')))
			{
			//requete d'enregistrement
			$newcat="INSERT INTO categorie (nom_cat, photo_cat) VALUES('".$_POST['nom_cat']."','$nom')";
			$req2=$bdd->exec($newcat);
			 if($req2!=false)
				 //echo ($newcat);
				 echo '<br/>';
				 echo 'Vous avez ajout&eacute la cat&eacute;gorie <b>'.$_POST['nom_cat'].'.<br/><b>';
				 echo '<a href="gerer_categorie.php">Gerer les cat&eacute;gories</a> <br/>';
			
			}
			else 
			{
			echo 'souci pendant le upload';
			}
		}
		else 
		{
			echo 'La categorie existe deja';
		}
		
}
else 
{
	echo 'souci pendant l\'enregistrement';
}	

?>
	