<?php
session_start();

?>

<!DOCTYPE html>
<html>


<head>
<meta charset="utf-8"/>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzEvS9oCS4DgCZo-lJhirTSxxUZENU9Yo" type="text/javascript"></script>

<script type="text/javascript" src="geo.js"></script>

<link rel="stylesheet" type="text/css" href="style2.css" />

<style>
@media print{
	#criteres, #imprime{
	display: none;
	}
}
</style>

</head>


<body>
			<div id="banner1"> PRES DE CHEZ VOUS	</div>

	<p class="topo"><i> Les producteurs autour de vous </i></p>
	

	

<?php


//Geolocalisation du consommateur

$urlWebServiceGoogle = 'http://maps.google.com/maps/api/geocode/json?address=%s&sensor=false&language=fr';
	
	
try {
		$bdd=new PDO('mysql:host=mysql-presdechezvous.alwaysdata.net;dbname=presdechezvous_ok', '150622_raisa', 'presdechezvous', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
		//$bdd=new PDO('mysql:host=localhost;dbname=presdechezvous_ok', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));	
	}
	catch (PDOException $e){ 
		echo 'Echec de la connexion:' .$e->getMessage();
		exit;
	}

//récupération des variables de session
	
	$adresse = $_SESSION['adresse'];

	$distance = $_SESSION['distance'];

	if (isset($_POST['parproduit'])){
		$_SESSION['parproduit'] = $_POST['parproduit'];
	$parproduit = $_SESSION['parproduit'];
}

 if(empty($parproduit) ){
    $X= "Entrer le nom d'un produit à rechercher!";
	header("location: list_prod2.php?mess=$X");
}

	
	$url = vsprintf($urlWebServiceGoogle, urlencode($adresse));
	$response = json_decode(file_get_contents($url));
     
		if (empty($response->status)) throw new Exception("Adresse incorrecte!");
		if ($response->status != "OK") throw new Exception($response->status);
 
			$latitude =  $response->results[0]->geometry->location->lat;
			$longitude = $response->results[0]->geometry->location->lng;



?>
<div id="criteres">
<header>
	<form method="POST" action="list_prod2.php">
		<fieldset>
		<select name="trie">
			<option value="prixASC" >Par prix croissant</option>
			<option value="prixDESC" >Par prix decroissant</option>
			<option value="distASC" >Par distance croissante</option>
			<option value="distDESC" >Par distance decroissante</option>
		</select></br>
	</fieldset>
			<input type="submit" value="ok" />
	</form>

</header>
</div></br>

<div "parproduit">
	<form name="formproduit" action="fromage.php" method="POST">
		<fieldset>
			<label>Rechercher par produit: <input type="text" placeholder="Entrez un nom de produit" name="parproduit"/></label>
		</fieldset>
		<input type="submit" value="Rechercher" />
	</form>
</div>

<div>
<!--titres du tableau des résultats de recherches-->

<?php // trie du tableau suivant les critères de prix et de distance

			if(isset($_POST['trie'])) {
	switch($_POST['trie']) {	case 'distASC':  $tri = 'dist ASC';
								break;

								case 'distDESC':  $tri = 'dist DESC';
								break;

								case 'prixASC':	 $tri = 'prix_produit ASC';
								break;

								case 'prixDESC':  $tri = 'prix_produit DESC';
								break;

								default:	$tri = 'prix_produit ASC';
								break;
		}

	} 			else {
			$tri = 'prix_produit ASC';
				} 



$formule="(6366*acos(cos(radians($latitude))*cos(radians(`latitude`))*cos(radians(`longitude`) -radians($longitude))+sin(radians($latitude))*sin(radians(`latitude`))))";



$sql="SELECT nom_producteur, prenom_producteur, adresse_producteur, photo_producteur, prix_produit, produit.nom_produit, produit.id_produit, $formule AS dist FROM producteur, produit, categorie 
WHERE $formule<= $distance and producteur.id_producteur=produit.id_producteur and categorie.id_cat=produit.id_cat and nom_produit LIKE'%".$parproduit."%'";
$sql .=" ORDER BY $tri";




$result=$bdd->query($sql);


//$resultat=$result->fetch();


if($result->rowCount() !=0){

	echo "<table border='1'>
	<tr>
		<th>Nom et Prénom:</th>
		<th>Adresse:</th>
		<th>Distance de vous* :</th>
		<th>Produits proposés :</th>
		<th>Prix :</th>
		
	</tr>";

	while($resultat=$result->fetch()){
	
//echo "<img width='150' height='150' src='http://presdechezvous.alwaysdata.net/producteur/".$resultat["photo_producteur"]."' alt='oups!'/>";
		$_SESSION['photo_producteur'] = $resultat['photo_producteur'];

	
?>
<!--<img src="<?php echo $_SESSION['photo_producteur'];?>" alt="oups!" height="150" width="150"/>-->
	<tr>
		<td class="avis" width="200px"><?php echo "<img width='150' height='150' src='http://presdechezvous.alwaysdata.net/producteur/".$resultat["photo_producteur"]."' alt='oups!'/></br><a href='description_prod.php?nom=".$resultat['nom_producteur']."&prenom=".$resultat['prenom_producteur']."'>".$resultat['nom_producteur']." ".$resultat['prenom_producteur']."</a>"; ?></td>
		<td class="avis" width="150px"><?php echo $resultat['adresse_producteur']; ?></td>
		<td class="avis" width="100px"><?php echo $resultat['dist']; ?></td>
		<td class="avis" width="100px"><?php echo $resultat['nom_produit']."</br><a href='message_prod.php?idprod=".$resultat['id_produit']."'> <i>commentaires </i></a>"; ?></td>
		<td class="avis" width="50px"><?php echo $resultat['prix_produit']; ?></td>
	</tr>
<?php

	}
		echo "</table>";
	echo "* Distance en km, à vol d'oiseau</br>";
	echo "<input type=\"submit\" onClick='window.print(); return false;' value=\"imprimer\"/>";
			}

	else{echo "</br><div>Désolé, il n'ya pas encore de producteurs correspondant à vos critères.</br></div>";	}

		
	echo "</div></br>";


?>
</div>
<a href="produit.php">Retour</a>

<div id="footer">
      <a href="index.html">Accueil</a>  | <a href="mentionslegales.html">Mentions légales</a>  |  <a href="contact.html">Nous contacter</a>
    </div>
</body>

</html>


