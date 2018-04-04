<?php
//inclure le fichier function pour la connexion a la BDD et isset&empty
//include_once '../fonctions.php';
include '../fonctions.php';

//on recupère la variable de connection à la base de données
$bdd = getBDD();


	if (issetNotEmpty($_POST['nom_producteur']) && issetNotEmpty($_POST['prenom_producteur']) && issetNotEmpty($_POST['telephone_producteur']) && 
		issetNotEmpty($_POST['adresse_producteur']) && issetNotEmpty($_POST['codepost_producteur']) && issetNotEmpty($_POST['email_producteur']) && 
		issetNotEmpty($_POST['motdepass']) &&issetNotEmpty($_POST['conf_motdepass']) && issetNotEmpty($_POST['affichecontact']) && issetNotEmpty($_POST['presentation']))
	{
		//declaration des variables
		$nom_producteur=$_POST['nom_producteur'];
		$prenom_producteur=$_POST['prenom_producteur'];
		$telephone_producteur=$_POST['telephone_producteur'];
		$adresse_producteur=$_POST['adresse_producteur'];
		$codepost_producteur=$_POST['codepost_producteur'];
		$email_producteur=$_POST['email_producteur'];
		$motdepass=$_POST['motdepass'];
		$conf_motdepass=$_POST['conf_motdepass'];
		$affiche=$_POST['affichecontact'];
		//$photo_producteur=$_POST['photo_producteur']; //lors de l'execution du script, msg d'erreur
		$presentation=$_POST['presentation'];
	
		//traitement de l'adresse, pour la transformer en longitude et latitude pour une insertion de la bdd
			 $urlWebServiceGoogle = 'http://maps.google.com/maps/api/geocode/json?address=%s&sensor=false&language=fr';

			//$postalAddress = '55 Faubourg Saint-Honoré, Paris, France';
 
			$url = vsprintf($urlWebServiceGoogle, urlencode($adresse_producteur));
			$response = json_decode(file_get_contents($url));
     
		if (empty($response->status)) throw new Exception();
		if ($response->status != "OK") throw new Execption($response->status);
			{
		$latitude =  $response->results[0]->geometry->location->lat;
		$longitude = $response->results[0]->geometry->location->lng;
 
		//echo 'Latitude: '.$latitude."\n";
		//echo 'Longitude: '.$longitude."\n";

		//si le mot de passe respecte la synthaxe
		if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{3,}$#', $motdepass)) //synthaxe du mot de passe
		{
			//si l'email est valide
			if (filter_var($email_producteur, FILTER_VALIDATE_EMAIL)) 
			{
					//on prepare la requete qui permet de selectionner l'email si elle existe deja dans la base de donnees
					$verifIdentifiant=$bdd->prepare("SELECT email_producteur FROM producteur WHERE email_producteur=:email_producteur");
					$verifIdentifiant -> bindParam(':email_producteur', $email_producteur);
					$verifIdentifiant -> execute();
					
					//si l'email existe effectivement dans la base de données
					if ($verifIdentifiant -> rowCount()!==1) 
					{
						//Creer un identifiant difficile a deviner
						$nom ='upload/'.$email_producteur.'.jpeg';
						//recuperer la photo
						if (upload ('photo_producteur', $nom, 1048576, array ('png','gif','jpg','jpeg'))) 	
						//if (upload ($nom, 'producteur/upload',1048576, array ('png','gif','jpg','jpeg'))) 
						{
							//procedure d'inscription d'un nouveau producteur dans la bdd
								//requete d'insertion par une requete preparée (:nom_producteur)
							$newProducteur="INSERT INTO producteur VALUES('', :nom_producteur, :prenom_producteur, :telephone_producteur, :adresse_producteur, :longitude_producteur, :latitude_producteur, :codepost_producteur, :email_producteur, :motdepass, :photo_producteur, :presentation, :affichecontact, 0)";
							$newProducteur=$bdd -> prepare($newProducteur); /*le producteur a pour type 0*/
							
					
							
								//requete de masque du mot de passe
							$hash_mdp= hash('sha256', $motdepass);

								//initialisation de la variable et son contenue
							$newProducteur -> bindParam(':nom_producteur', $nom_producteur, PDO::PARAM_STR);
							$newProducteur -> bindParam(':prenom_producteur', $prenom_producteur, PDO::PARAM_STR);
							$newProducteur -> bindParam(':telephone_producteur', $telephone_producteur, PDO::PARAM_INT);
								
							$newProducteur -> bindParam(':adresse_producteur', $adresse_producteur, PDO::PARAM_INT);
							$newProducteur -> bindParam(':longitude_producteur', $longitude, PDO::PARAM_STR);
							$newProducteur -> bindParam(':latitude_producteur', $latitude, PDO::PARAM_STR);

							$newProducteur -> bindParam(':codepost_producteur', $codepost_producteur, PDO::PARAM_INT);
								
						
							$newProducteur -> bindParam(':email_producteur', $email_producteur, PDO::PARAM_STR);
							$newProducteur -> bindParam(':motdepass', $hash_mdp, PDO::PARAM_STR);
								
							$newProducteur -> bindParam(':photo_producteur', $nom, PDO::PARAM_STR);
							$newProducteur -> bindParam(':presentation', $presentation, PDO::PARAM_STR);
							$newProducteur -> bindParam(':affichecontact', $affiche, PDO::PARAM_STR);
								
								//execution de la requete d'insertion d'un nouveau producteur dans la bd
							$resultat = $newProducteur-> execute() ;
							if ($resultat==true) 
							{
								
								
								
								echo 'F&eacute;licitation, vous avez cr&eacute;&eacute; votre compte! <br />';
								echo '<a href="../index.html">Page d\'accueil</a> <br />';
								
							}
							else
							{
								echo 'Probleme rencontr&eacute lors de l\'enregistrement, veuillez recommencer';
								echo '<a href="form_nvprod.php">Retour au formulaire d\'enregistrement</a> <br />';
								}
						
						}//fin si upload()
						else
						{
							echo 'Un probl&egrave;me est survenue lors du transfert du fichier, veuillez recommencer s\'il vous plait';
							echo '<a href="form_nvprod.php">Retour au formulaire d\'enregistrement</a> <br />';
						}
					}// fin si l'email existe effectivement dans la base de données
					else 
					{
						echo 'L\'adresse email saisie existe d&eacute;ja.';
						echo '<a href="form_nvprod.php">Retour au formulaire d\'enregistrement</a> <br />';
					}
			}// fin si l'email est valide
			else 
			{
				echo 'L\'adresse email saisie n\'est pas valide.';
				echo '<a href="form_nvprod.php">Retour au formulaire d\'enregistrement</a> <br />';
			}
		} //fin si le mot de passe respecte la synthaxe
		else
		{
			echo '<script type = "text/javascript">window.alert("Votre mot de passe doit respecter la synthaxe suivante: au moins un caract&egrav;re majuscule, des caract&egrav;res minuscules, des chiffres et des caract&egrav;res sp&eacute;aux ");</script>';
			echo '<a href="form_nvprod.php">Retour au formulaire d\'enregistrement</a> <br />';
		}
	}//fin si on verifie que tous les champs obligatoire du formulaire ont été remplis
}
else 
{
	echo 'Vous devez remplir tous les champs obligatoires y compris le champ de pr&eacute;sentation';
	echo '<a href="form_nvprod.php">Retour au formulaire d\'enregistrement</a> <br />';
}
?>
