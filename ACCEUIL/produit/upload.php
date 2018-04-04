<?php
	/*
	//script de verification des photos uploades
 		$_FILES['photo_produit']['name'] //le nom du fichier comme sur le disque dur du visiteur
 		$_FILES['photo_produit']['type'] //type du fichier
 		$_FILES['photo_produit']['size'] //la taille max du fichier a envoyer
 		$_FILES['photo_produit']['tmp_name']//dossier temporaire de stockage des photos uploadees
 		$_FILES['photo_produit']['error'] //le code pour le message d'erreur
		
		//fonction de controle
				//message d'erreur
			if ($_FILES['icone']['error'] > 0) $erreur = "Erreur lors du transfert";
				//taille maximum
			if ($_FILES['icone']['size'] > $maxsize) $erreur = "Le fichier est trop gros";

				//gestion des extension
			$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
			//1. strrchr renvoie l'extension avec le point (« . »).
			//2. substr(chaine,1) ignore le premier caractère de chaine.
			//3. strtolower met l'extension en minuscules.
			$extension_upload = strtolower(  substr(  strrchr($_FILES['icone']['name'], '.')  ,1)  );
			if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";

			//controle des dimensions de l'image
			$image_sizes = getimagesize($_FILES['icone']['tmp_name']);
			if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande";

		//Deplacer le fichier
			//creer un dossier 'fichier/1/'
			mkdir('fichier/1/', 0777, true);
			
			//cree un identifiant 
			$nom = md5(uniqid(rand(), true));
			 
			//une fois le nom du fichier choisi, le deplacer dans le dossier crée
			$nom = "avatars/{$id_membre}.{$extension_upload}";
			$resultat = move_uploaded_file($_FILES['icone']['tmp_name'],$nom);
			if ($resultat) echo "Transfert réussi";
	*/	
		
?>