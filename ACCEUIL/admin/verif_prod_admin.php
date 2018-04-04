<?php
	//connexion à la bdd bulle_patissiere ordinateur asus
	try {$bdd=new PDO('mysql:host=localhost;dbname=presdechezvous', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));	
		}
	catch (PDOException $e){ 
		echo 'Echec de la connexion:' .$e->getMessage();
		exit;
	}
/*	//connexion à la bdd employée ordinateur asus
	try {$bdd=new PDO('mysql:host=localhost; dbname=employe', 'root','', array (PDO::ATTR_ERRMODE=> PDO::ERRMODE_WARNING));
		}
	catch (PDOException $e){ 
		echo 'Echec de la connexion:' .$e->getMessage();
		exit;
	}
	
	//on se connecte à MySQL ordinateur istic
	try {$bdd=new PDO('mysql:host=mysql.istic.univ-rennes1.fr; port=3306; dbname=base_16011434; charset=utf8', 'user_16011434', 'estel21+', array (PDO::ATTR_ERRMODE=> PDO::ERRMODE_WARNING));
		}
		catch (PDOException $e){ 
			echo 'Echec de la connexion:' .$e->getMessage();
				exit;
				}	
*/	

//on demarre la session, étape indispensable
session_start() ;

if ((isset($_POST["email_admin"]) && isset($_POST["motdepass"])) and (!empty($_POST["email_admin"])&& !empty($_POST["motdepass"])))
{	
	//on recupère les variables
	$email_admin=$_POST["email_admin"];
	$motdepass=$_POST["motdepass"];
	$hash_mdp= hash('sha256', $motdepass);
//$nom_admin=$_POST['nom_admin'];
		
	//preparation de la requete
	$req=$bdd->prepare("SELECT * FROM admin WHERE email_admin=? and motdepass=?");
	//execution de la requete
	$req->execute(array ($email_admin, $hash_mdp));
	$resultat=$req->fetch();
	$nb = $req-> rowCount();
	echo $nb;

	//si le client existe dans la base de données
	if($nb==1)
	{							
    // Utilisation des données.
			$_SESSION['id_admin']=$resultat['id_admin'];
			$_SESSION['nom_admin']=$resultat['nom_admin'];
			$_SESSION['prenom_admin']=$resultat['prenom_admin'];
			$_SESSION['email_admin']=$resultat['email_admin'];
			
			$_SESSION['motdepass']=$resultat['motdepass'];	
			
			$_SESSION['type_pers']=$resultat['type_pers'];
					
		if ($_SESSION['type_pers']==1) 
		{
			header ('Location: accueil_admin.php');
		}	

	}
	else 
	{
		//header('Location: form_prod.php');//a actualiser avec le fichier final de form_client
?>
			<script language='javascript'>
				alert('Votre email et/ou votre mot de passe est erron\u00E9, veuillez reessayer s\'il vous plait.');
				window.location.href='form_prod.php';
			</script>
<?php
	}
}		
else 
	{
		//header('Location: form_prod.php');//a actualiser avec le fichier final de form_client
?>
			<script language='javascript'>
				alert('Remplir les champs.');
				window.location.href='form_prod.php';
			</script>
<?php
	} 
	
?>		
