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


<?php
echo '<a href="../producteur/deconnect_prod.php">D&eacute;connexion</a>';
?>