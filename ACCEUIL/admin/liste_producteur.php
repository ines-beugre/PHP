<html>
<body>

<?php
	
include_once '../fonctions.php';
 
$bdd = getBDD();
//on demarre la session, étape indispensable
//session_start(); //a adapter


			// On teste pour voir si nos variables ont bien été enregistrées
//	echo 'Bienvenue '.$_SESSION['email_client'].' sur votre compte!<br />'; //faire de telle sorte que ça soit le prenom qui s'affiche
	
	echo 'Bienvenue <b><i>'.$_SESSION['prenom_admin'].' </i></b>sur votre compte admin!<br />'; //faire de telle sorte que ça soit le prenom qui s'affiche
	echo '<br/>';
	
	echo '<a href="gerer_compte.php">Retour</a><br/>';
	echo '<p/>';
	
		//affichage de la liste
	echo 'Liste des producteurs <br/>';
	
	//echo displayTableElement(1);
	echo displayTableElement(0);
?>
<!--
  <a href="" onclick="ConfirmDelete();">Supprimer</a>
  <a href="" onclick="ConfirmModif();">Modifier</a>
 --> 
<p/>
	<!--
	<p><a href="modif_prod.php">Modifier le compte d'un producteur</a><br/>
	-->
	<a href="Form_suppr_prod.php">Supprimer un producteur</a><br/>
	
<p/>
	
	
<a href="gerer_categorie.php">Gerer les cat&eacute;gories</a> |
	<a href="gerer_compte.php">Gerer les comptes</a> | 
	<!--
	<a href="modifcoord.php">Modifier vos coordonn&eacute;es</a> | -->	
	

	<a href="../producteur/deconnect_prod.php">D&eacute;connexion</a>

	

</body>
  <script type="text/javascript">
      function ConfirmDelete(nom)
      {
		var checkedBoxes = document.querySelectorAll('input[name=producteurcheckbox]:checked');
		
			if (checkedBoxes.length == 0) {alert ("Veuillez cocher une case");
			}
			else 
			{ 
			console.log(checkedBoxes[0].value);
			window.location.href="http://localhost/pfe13/admin//suppr_prod.php?nom_producteur="+checkedBoxes[0].value";
          //  if (confirm('Etes-vous sûr de vouloir supprimer cette entrée'))
			
			}
      }
	  
	        function ConfirmModif(nom)
      {
         var checkedBoxes = document.querySelectorAll('input[name=producteurcheckbox]:checked');
			if (checkedBoxes.length == 0) {alert ("Veuillez cocher une case");}
			else 
			{
			if (confirm('Etes-vous sûr de vouloir supprimer cette entrée'))
                 location.href="suppr_prod.php?nom_producteur="+nom;
			}
      }
  </script>
</html>
	