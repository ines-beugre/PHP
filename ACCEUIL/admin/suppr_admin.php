<?php
//inclure le fichier function pour la connexion a la BDD et isset&empty
//include_once '../fonctions.php';
include '../fonctions.php';

//on recupère la variable de connection à la base de données
$bdd = getBDD();

//
	//si le bouton a ete cliqué, c'est que tous les champs ont ete rempli
/*  if (isset ($_POST['inscr_nvclient'])) //ici mettre le name du button submit //dans le cas de la géolocalisation, pas de besoin de verifier le bouton subpit, car il bloque la validation du formulaire
{ */
	//on verifie que tous les champs obligatoire du formulaire ont été remplis
	
	if (issetNotEmpty($_POST['nom_admin']) && 
		issetNotEmpty($_POST['email_admin']) )
	{
		//declaration des variables
		$nom_admin=$_POST['nom_admin'];
		$email_admin=$_POST['email_admin'];	
			//si l'email est valide
		if (filter_var($email_admin, FILTER_VALIDATE_EMAIL)) 
		{
				//on prepare la requete qui permet de selectionner l'email si elle existe deja dans la base de donnees
			$verifIdentifiant=$bdd->prepare("SELECT email_admin FROM admin WHERE email_admin=:email_admin");
			$verifIdentifiant -> bindParam(':email_admin', $email_admin);
			$verifIdentifiant -> execute();
					
				//si l'email existe effectivement dans la base de données
			
			if ($verifIdentifiant -> rowCount() == 1) 
				{
					//procedure de suppression de l' admin dans la bdd
						//requete de suppression par une requete preparée (:nom_admin)
				$supprAdmin=$bdd->prepare('DELETE FROM admin WHERE email_admin="'.$email_admin.'"');
				$supprAdmin -> bindParam (':email_admin', $email_admin);
										
					$resultat = $supprAdmin-> execute() ;
					if ($resultat==true)
	
					{	
						echo 'Vous avez supprim&eacute; le compte de l\'administrateur <b>'.$nom_admin.' <b/><br/>';
						echo '<a href="gerer_compte.php">Page d\'accueil</a> <br/>';
					}
					else
					{
					echo 'Probl&egraveme; survenu lors de la suppression d\un compte admin <br/>';
					echo '<a href="Form_suppr_admin1.php">Retour</a> <br/>';
					}
				}// fin si l'email existe effectivement dans la base de données
			else
				{
					echo 'L\'email n\'existe pas<br/>';
					echo '<a href="Form_suppr_admin1.php">Retour</a> <br/>';
				}
		}//fin email_valide
		else
		{
		echo 'L\'email n\'est pas valide<br/>';
		echo '<a href="Form_suppr_admin1.php">Retour</a> <br/>';
		}
	}
	else
	{
		echo 'Remplissez tous les champs<br/>';
		echo '<a href="Form_suppr_admin1.php">Retour</a> <br/>';
	}			
	/*
}//fin programme
else 
 {
?>

<script>
alert("Remplissez tous les champs s\'il vous plait");
</script>	

<?php
} */

?>
