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

			//Creer un identifiant difficile a deviner
			$nom ='upload/'.$email_producteur.'.jpeg';
			//recuperer la photo
			if (upload ('photo_producteur', $nom, 1048576, array ('png','gif','jpg','jpeg'))) 	
			//if (upload ($nom, 'producteur/upload',1048576, array ('png','gif','jpg','jpeg'))) 
				{
					//procedure de mise a jour des donnees du producteur dans la bdd
						//requete d'insertion par une requete preparée (:nom_producteur)
					$modifProducteur="UPDATE producteur SET nom_producteur='".$nom_producteur."', prenom_producteur='".$prenom_producteur."', telephone_producteur='".$telephone_producteur."', adresse_producteur='".$adresse_producteur."', codepost_producteur='".$codepost_producteur."', affiche='".$affiche."' ";
					$modifProducteur=$bdd -> prepare($modifProducteur); /*le producteur a pour type 0*/
					
						//execution de la requete d'insertion d'un nouveau producteur dans la bd
							$resultat = $modifProducteur-> execute() ;
							var_dump($resultat);
							if ($resultat==true) 
							{
								echo 'F&eacute;licitation, vous avez modifi&eacute; vos coordonn&eacute;es!';
								
							}
							else
							{
								echo 'Probleme rencontr&eacute lors de la modification';
							
							}
				}// fin if upload
			else {
					echo 'Un probl&egrave;me est survenue lors du transfert du fichier, veuillez recommencer s\'il vous plait';
				 }
				
			}// if adresse
	
	
}// fin if issetNotEmpty()

?>