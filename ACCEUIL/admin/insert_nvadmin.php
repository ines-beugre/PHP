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
	
	if (issetNotEmpty($_POST['nom_admin']) && issetNotEmpty($_POST['prenom_admin']) && 
		issetNotEmpty($_POST['email_admin']) && issetNotEmpty($_POST['motdepass']) && 
		issetNotEmpty($_POST['conf_motdepass']) )
	{
		//declaration des variables
		$nom_admin=$_POST['nom_admin'];
		$prenom_admin=$_POST['prenom_admin'];
		$email_admin=$_POST['email_admin'];
		$motdepass=$_POST['motdepass'];
		$conf_motdepass=$_POST['conf_motdepass'];
	
		//si le mot de passe respecte la synthaxe
		if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$#', $motdepass)) //synthaxe du mot de passe
		{
			//si l'email est valide
			if (filter_var($email_admin, FILTER_VALIDATE_EMAIL)) 
			{
					//on prepare la requete qui permet de selectionner l'email si elle existe deja dans la base de donnees
					$verifIdentifiant=$bdd->prepare("SELECT email_admin FROM admin WHERE email_admin=:email_admin");
					$verifIdentifiant -> bindParam(':email_admin', $email_admin);
					$verifIdentifiant -> execute();
					
					//si l'email existe effectivement dans la base de données
					if ($verifIdentifiant -> rowCount()!==1) 
					{
						//procedure d'inscription d'un nouveau admin dans la bdd
								//requete d'insertion par une requete preparée (:nom_admin)
							$newAdmin="INSERT INTO admin VALUES('', :nom_admin, :prenom_admin, :email_admin, :motdepass, 1)";
							
							$newAdmin = $bdd -> prepare($newAdmin); /*le admin a pour type 0*/		
									
								//requete de masque du mot de passe
							$hash_mdp= hash('sha256', $motdepass);

								//initialisation de la variable et son contenue
	//initialisation de la variable et son contenue
							$newAdmin -> bindParam(':nom_admin', $nom_admin, PDO::PARAM_STR);
							$newAdmin -> bindParam(':prenom_admin', $prenom_admin, PDO::PARAM_STR);
															
							$newAdmin -> bindParam(':email_admin', $email_admin, PDO::PARAM_STR);
							$newAdmin -> bindParam(':motdepass', $hash_mdp, PDO::PARAM_STR);
							
								//execution de la requete d'insertion d'un nouveau admin dans la bd
							$resultat = $newAdmin-> execute() ;
							if ($resultat==true) 
							{	
								echo 'F&eacute;licitation, vous avez cr&eacute;&eacute; un compte administrateur! <br />';
								echo '<a href="accueil_admin.php">Page d\'accueil</a> <br />';
							}
							else
							{
								echo 'Probl&egrave; survenu lors de la cr&eacute;tion d\un compte admin <br />';
								echo '<a href="accueil_admin.php">Page d\'accueil</a> <br />';
							}
					}// fin si l'email existe effectivement dans la base de données
					else 
					{
						echo 'L\'adresse email saisie existe d&eacute;ja. <br />';
						echo '<a href="accueil_admin.php">Page d\'accueil</a> <br />';
					}
			}// fin si l'email est valide
			else 
			{
				echo 'L\'adresse email saisie n\'est pas valide. <br />';
				echo '<a href="accueil_admin.php">Page d\'accueil</a> <br />';
			}
		} //fin si le mot de passe respecte la synthaxe
		else
		{
			echo '<script type = "text/javascript">window.alert("Votre mot de passe doit respecter la synthaxe suivante: au moins un caract&egrav;re majuscule, des caract&egrav;res minuscules, des chiffres et des caract&egrav;res sp&eacute;aux ");</script>';
		
		}//fin si on verifie que tous les champs obligatoire du formulaire ont été remplis
	}
	else 
	{
		echo 'Vous devez remplir tous les champs obligatoires <br />';
		echo '<a href="accueil_admin.php">Page d\'accueil</a> <br />';
		
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
