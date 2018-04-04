<?php
	
	include_once '../fonctions.php'; 
$bdd = getBDD();

	echo 'Vous &ecirc;tes connect&eacute; en tant que <b><i>'.$_SESSION['prenom_admin'].' </i></b>sur votre compte admin!<br />'; //faire de telle sorte que ça soit le prenom qui s'affiche
		
	echo '<i> Vous souhaitez: <br />';
	
	echo '<p/>';

	echo '<a href="gerer_compte.php" target="_blank">Gerer les comptes</a> <br /> <p/>';
	echo'<p>';
	echo '<a href="gerer_categorie.php">Gerer les cat&eacute;gories</a> <br />';
	echo '<ul><li><a href="Form_categorie1.php">Cr&eacute;er une nouvelle cat&eacute;gorie</a> </li>';
	echo '<li><a href="modif_categorie.php">Modifier une cat&eacute;gorie</a></li>';
	
	echo '<p/>';
	echo '<li><a href="Form_suppr_cat.php">Supprimer une cat&eacute;gorie</a></li></ul>';
?>

<p/>
<html>
<body>

<table  width = "500" border="1">
<tr>
	<form action="insert_supprCat.php" method="POST" enctype="multipart/form-data">
		<td>
		<table  width = "100%" border="1">
				<caption><strong>Suppimer une cat&eacute;gorie</strong></caption>
			
			<tr>
					<td>
						Choisir la cat&eacute;gorie
					</td>
					<td>
						<select id="id_cat" name="id_cat" value="id_cat" onchange="changePhoto(this.select)">
							<?php 
								//connexion Ã  la bdd presdechezvous ordinateur asus
							try {$bdd=new PDO('mysql:host=mysql-presdechezvous.alwaysdata.net;dbname=presdechezvous_ok;charset=utf8', '150622_ines', 'presdechezvous', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
							}
							catch (PDOException $e){
								echo 'Echec de la connexion:' .$e->getMessage();
								exit;
							}
							//requete de selection des categories			
							$req1=('SELECT * from categorie');
							$req2= $bdd -> query($req1);								
									
							//le script recupère directement les categories dans la base de donnees écrits dans Script_InsertTAble pour l'insertion des catégories dans la table
							while($row=$req2->fetch(PDO::FETCH_ASSOC)) {
								echo'<option value="'.$row['id_cat'].'">'.$row['nom_cat'].'</option>';
							
							///garder en session  les données de categories
								$_SESSION['id_cat']=$row['id_cat'];
								$_SESSION['nom_cat']=$row['nom_cat'];
								//$_SESSION['photo_cat']=$row['photo_cat'];
								$_SESSION['photo_cat']=$row['photo_cat'];
							}
							?>
						</select>
					</td>			
			</tr>	
		
			<tr>
				<td colspan="2"><center>
				<input type="submit" value="Supprimer"></center>
				</td>
			</tr>
		</table>
		</td>	
</tr>
</table>

</body>
</html>

<?php
	
	echo '<p/>';
	echo '<a href="../producteur/deconnect_prod.php">D&eacute;connexion</a><br />';
	
	echo '<a href="../index.html">Accueil</a> <br />';

?>