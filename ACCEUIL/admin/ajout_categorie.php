<?php
include_once '../fonctions.php'; 
$bdd = getBDD();
//on demarre la session, étape indispensable
//session_start(); //a adapter


			// On teste pour voir si nos variables ont bien été enregistrées
//	echo 'Bienvenue '.$_SESSION['email_client'].' sur votre compte!<br />'; //faire de telle sorte que ça soit le prenom qui s'affiche
	
	echo 'Bienvenue <b><i>'.$_SESSION['prenom_admin'].' </i></b>sur votre compte admin!<br />'; //faire de telle sorte que ça soit le prenom qui s'affiche
	
	echo '<i> Vous souhaitez: <br />';
	
	echo '<p/>';
	
	echo '<a href="gerer_compte.php" target="_blank">Gerer les comptes</a> <br />';
	
	echo '<a href="gerer_categorie.php">Gerer les cat&eacute;gories</a> <br />';
	
	
		echo '<ul><li><a href="ajout_categorie1.php">Cr&eacute;er une nouvelle cat&eacute;gorie</a> </li>';
		echo '<li><a href="modif_categorie.php">Modifier une cat&eacute;gorie</a></li>';
		echo '<li><a href="suppr_compte.php">Supprimer une cat&eacute;gorie</a></li></ul>';
		echo '<a href="../index.html">Accueil</a> <br />';
	// On affiche un lien pour fermer la session session du client
	echo '<a href="../producteur/deconnect_prod.php">D&eacute;connexion</a>';
?>

<html>
<body>

<br/>
<br/>

<table  width = "400" border="1">
<tr>
	<form name="Ajout_categorie" action="insert_categorie.php" method="POST" enctype="multipart/form-data" onsubmit="return verifForm(this)">
		<td>
		<table  width = "100%" border="0">
				<caption>Ajouter une nouvelle cat&eacute;gorie</caption>
			<tr>
				<td>
				<input type="text" placeholder="Nom de la cat&eacute;gorie" name="nom_cat" value=""/ size="50">	<br/>	
				</td>			
			</tr>
			
			<tr>
				<td> 
				</td>			
			</tr>
			
			<tr>
				<td colspan="2">
					Ajouter une photo (JPG, PNG ou GIF |max. 1Mo)
					<input type="hidden" name="max_file_size" value="1048576" />
					<input type="file" name="photo_cat" id="photo_cat" required> 
				</td>		
			</tr>
	
            <tr>
				<td> 
				</td>			
			</tr>
		
			<tr>
				<td colspan="2">
					<center><button id="edit-submit" class="btn form-submit" type="button" name="ajout_categorie" onCLick="verifFormcat();"  value="Ajouter">Ajouter</button></center>
				</td>
				</tr>
			
		</table>
		</td>	
</tr>
</table>
<script type="text/javascript" src="../producteur/verifForm.js"></script>
</body>
</html>











