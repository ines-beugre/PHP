<?php
session_start();
?>

<html>

<head>
	<meta charset="utf-8"/>
<title>		description du producteur		</title>
	
	<link rel="stylesheet" type="text/css" href="style3.css" />

</head>

<body>

	 <div id="banner1"> PRES DE CHEZ VOUS </div>


<?php

try {
		$bdd=new PDO('mysql:host=mysql-presdechezvous.alwaysdata.net;dbname=presdechezvous_ok', '150622_raisa', 'presdechezvous', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

		//$bdd=new PDO('mysql:host=localhost;dbname=presdechezvous_ok', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));	
	}
	catch (PDOException $e){ 
		echo 'Echec de la connexion:' .$e->getMessage();
		exit;
	}

	if (isset($_GET['nom']) && isset($_GET['prenom'])){

		 $_SESSION['nom'] = $_GET['nom'];
		 $nom = $_SESSION['nom'];
		  
		 $_SESSION['prenom'] = $_GET['prenom'];
		 $prenom = $_SESSION['prenom'];
		 
		
			$sql="SELECT * FROM producteur, produit WHERE producteur.id_producteur=produit.id_producteur and nom_producteur='$nom' and prenom_producteur='$prenom'";

			$res=$bdd->query($sql);

			$resultat=$res->fetch();
	}
		echo "<h3>Vous êtes sur la page de description du producteur ".$nom." $prenom".".</h3>";


		?>
<div class="prod"><center>
		<table class="cool1">
			<tr>
				<td><?php echo "<img width='150' height='150' src='http://presdechezvous.alwaysdata.net/producteur/".$resultat["photo_producteur"]."' alt='oups!'/>";?></td>
			</tr>
			<tr>
				<td><?php echo $resultat['presentation'] ;?></td>
			</tr>
		</table>

	</center>
</div>

<a href="list_prod2.php">Retour</a>
<div id="footer">
      <a href="index.html">Accueil</a>  | <a href="mentionslegales.html">Mentions légales</a>  |  <a href="contact.html">Nous contacter</a>
    </div>


	</body>
</html>
