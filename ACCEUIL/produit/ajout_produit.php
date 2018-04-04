<html>
<head><title></title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" enctype="multipart/form-data" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
		
	<link rel="stylesheet" type="text/css" href="../style.css" />

</head>

<div id="banner1"> PRES DE CHEZ VOUS	</div>
	<div id="menu"></div>

	<script language="Javascript">
		function limiter1(){
			maximum=50;
			champ=document.Formulaire_ajoutproduit.description_produit; // le_nom_du_formulaire.le_nom_du_champ
			indic=document.Formulaire_ajoutproduit.indicateur; //le_nom_du_formulaire.le_name_du_<input>
			
			  if (champ.value.length > maximum)
			champ.value = champ.value.substring(0, maximum);
			else 
			indic.value = maximum - champ.value.length;
		}
		
	</script>

</head>
<body>

<?php
//on demarre la session, étape indispensable
include_once '../fonctions.php'; 
$bdd = getBDD();

	echo '<h3>Vous &ecirc;tes conntect&eacute; en tant que <b><i>'.$_SESSION['prenom_producteur'].' </i></b>sur votre compte Producteur</h3>'; //faire de telle sorte que ça soit le prenom qui s'affiche
	echo '<a href="../producteur/accueil_producteur.php">Votre page d\'accueil</a>';
	echo '<br/>';
	echo '<br/>';
?>

<table width="400" border="1">

	<tr><form name="Formulaire_ajoutproduit" action="insert_produit1.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
		<td><center><strong>Ajouter un nouveau produit</strong></center>
			<table width="100%" border="0">
				<tr>
					<td>
						Cat&eacute;gorie
					</td>
					<td>
						<select id="id_cat" name="id_cat" value="id_cat">
							<?php 
								//connexion Ã  la bdd presdechezvous ordinateur asus
							try 
							{
								//$bdd=new PDO('mysql:host=localhost;dbname=presdechezvous', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
								$bdd = new PDO('mysql:host=mysql-presdechezvous.alwaysdata.net;dbname=presdechezvous_ok;charset=utf8', '150622_ines', 'presdechezvous', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

							}
							catch (PDOException $e){
								echo 'Echec de la connexion:' .$e->getMessage();
								exit;
							}
							
							//on fait une requete pour selectionner la table categorie
				
							$req1=('SELECT * from categorie');
							$req2= $bdd -> query($req1);
							 							
							//le script recupère directement les categories dans la base de donnees écrits dans Script_InsertTAble pour l'insertion des catégories dans la table
							while($row=$req2->fetch(PDO::FETCH_ASSOC)) {
								echo'<option value="'.$row['id_cat'].'">'.$row['nom_cat'].'</option>';
							}
							?>
						</select>
					</td>			
				</tr>
				<tr>
					<td>
						Intitul&eacute; du produit
					</td>
					<td>
						<input type="text" name ="nom_produit" id="nom_produit" placeholder="Tomate, Riz, lait..." value="" size="30">
					</td>
				</tr>
				
				<tr>
					<td>
						Prix du produit
					</td>
					<td>
						<input type="text" name="prix_produit" id="prix_produit" placeholder="" value="" size="30">
					</td>
				</tr>
				
				
				<tr>
					<td colspan="2">
					<textarea id="description_produit" class="form-texte required" placeholder="Desciption du produit..." name="description_produit" cols="50" rows="5" onKeyDown="limiter1();" onKeyUp="limiter1();" ></textarea><br />
					<i>Il vous reste <input readonly type=text name="indicateur" size="1" maxlength=3 value="50">caract&egrave;res</i>
					</td>
				</tr>
				
				<tr>
					<td colspan="2">
						Ajouter une photo <i>(JPG, PNG ou GIF |max. 1Mo)</i>
						<input type="hidden" name="max_file_size" value="1048576" />
						<input type="file" name="photo_produit" id="photo_produit"> 
					</td>		
				</tr>
				
				<tr>
					<td colspan="2">
						<center><button id="edit-submit" class="btn form-submit" type="submit" name="ajout_produits" value="Ajouter">Ajouter</button></center>
					</td>
				</tr>
				
			</table>
		</td>
	</tr>
</table>

<script type="text/javascript" src="script_produit.js"></script> <!-- script qui permet de signaler en rouge les champs non renseigner -->
</br>
</body>
</html>

<?php
echo '<a href="../producteur/deconnect_prod.php">D&eacute;connexion</a>';
?>