<?php
session_start();
?>
		<html>

<head><title> Commentaires</title>	
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="style3.css" />
	
</head>
<body>
	 <div id="banner1"> PRES DE CHEZ VOUS </div>

<?php
echo "<h3>Commentaires sur le produit</h3>";
try {
		$bdd=new PDO('mysql:host=mysql-presdechezvous.alwaysdata.net;dbname=presdechezvous_ok', '150622_raisa', 'presdechezvous', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

		//$bdd=new PDO('mysql:host=localhost;dbname=presdechezvous_ok', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));	
	}
	catch (PDOException $e){ 
		echo 'Echec de la connexion:' .$e->getMessage();
		exit;
	}
$idproduit= $_SESSION['idprod'];
	$sqlll="SELECT * FROM produit WHERE id_produit=$idproduit";
	$resll=$bdd->query($sqlll);

	$resulter=$resll->fetch();
	echo "<center><img width='150' height='150' src='http://presdechezvous.alwaysdata.net/produit/".$resulter["photo_produit"]."' alt='oups!'/><br></center>";
	echo "<center><b><u>".$resulter["nom_produit"]."</u></b></center>";



if (isset($_POST['message']) && isset($_POST['nom_conso']) &&  isset($_POST['email_conso']) && isset($_POST['notesA'])){
	$message = $_POST['message'];
	$note = $_POST['notesA'];
	$nom_conso=$_POST['nom_conso'];
	$email_conso=$_POST['email_conso'];
	$date=date("Y-m-d H:i:s");


		?>


	<?php

	$ressql3=$bdd->prepare("INSERT INTO Avis_prod VALUES('', :message, :idproduit, :note, :noms, :email_conso, :dateheure)");

	//echo $ressql3;
	
	$ressql3->bindParam(':message', $message);
	$ressql3->bindParam(':idproduit', $idproduit);
	$ressql3->bindParam(':note', $note);
	$ressql3->bindParam(':noms', $nom_conso);
	$ressql3->bindParam(':email_conso', $email_conso);
	$ressql3->bindParam(':dateheure', $date);

	$result=$ressql3->execute(); 

		if($result=true){
		echo "<p><center><i>Votre commentaire a été bien pris en compte</i></center></p>";
	}
		else{echo " Message non envoyé";
	}
}

//tester si le commentaire a été enregistré
	

//afficher l'ensemble des commentaires

	$sql="SELECT * FROM Avis_prod WHERE id_produit=$idproduit";
	$res=$bdd->query($sql);


echo "<table class='cool1'>";
foreach($res as $row){
	$result=$res->fetch();
	
		$note=0;
	if($result['note']==1){
		$note='*';
		}
		elseif($result['note']==2){
			$note='**';
			} elseif($result['note']==3){$note='***';}
				elseif($result['note']==4){$note='****';}
					else{$note='*****';}
				
	
?>

	
<tr>
	<td class="cool1"><u><?php echo $result['Noms']."</u>  &nbsp; Le:  ".$result['dateheure']." &nbsp;Note: ".$note;?></td>

</tr>

<tr>
	<td><textarea name="message" rows="4" cols="60" value=""><?php echo $result['Contenu_avis'];?></textarea></br></td>
</tr>

</br>

	<?php
}echo "</table >";



	?>
	</br><center><a href="message_prod.php">Ajouter un commentaire?</a></center>

	<a href="message_prod.php">Retour</a>
	
	<div id="footer">
      <a href="index.html">Accueil</a>  | <a href="mentionslegales.html">Mentions légales</a>  |  <a href="contact.html">Nous contacter</a>
    </div>

	</body>
</html>