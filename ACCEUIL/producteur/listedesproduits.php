<html>
<title>Liste de mes produits</title>
<body>

<?php

// connection à la DB

include_once '../fonctions.php'; 
$bdd = getBDD();
 echo 'Vous &ecirc;tes connect&eacute; en tant que <b><i>'.$_SESSION['prenom_producteur'].'<br />'; //faire de telle sorte que ça soit le prenom qui s'affiche

// requête SQL qui compte le nombre total d'enregistrement dans la table et qui

//récupère tous les enregistrements
echo displayTableElement(1);
$select = "SELECT * FROM produit, producteur WHERE produit.id_producteur='".$_SESSION['id_producteur']."'";
$result = $bdd -> query ($select);
$result1 = $result-> fetch();
$nb = $result -> rowCount();
	
	// si on a récupéré un résultat on l'affiche.	
	if ($nb==1)
	{
		 // debut du tableau
		echo '<table border="1">'."\n";
		echo '<tr>';
			echo '<td><b><u>Nom</u></b></td>';
			echo '<td><b><u>Prix</u></b></td>';
			echo '<td><b><u>Description</u></b></td>';
			echo '<td><b><u>Photo</u></b></td>';
			echo '<td><b><u>id</u></b></td>';
		echo '</tr>'."\n";
		
		while($row=$result->fetch(PDO::FETCH_ASSOC))
		{
		echo '<tr>';
			echo '<td>'.$row["nom_produit"].'</td>';
			echo '<td>'.$row["prix_produit"].'</td>';
			echo '<td>'.$row["description_produit"].'</td>';
			echo '<td>'.$row["photo_produit"].'</td>';
			echo '<td>'.$row["id_producteur"].'</td>';
		echo '</tr>'."\n";
		}
		// fin du tableau
		echo '</table>'."\n";
	}
	else 
	{
		echo'Vous n\'avez pas de produit enregistr&eacute;';
	}
 
// si on a récupéré un résultat on l'affiche.
?>

</body>

</html>

<?php
	echo '<p/>';
	echo '<a href="deconnect_prod.php">D&eacute;connexion</a>';
?>