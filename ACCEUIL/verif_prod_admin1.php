<?php
	//connexion à la bdd bulle_patissiere ordinateur asus
	try 
	{$bdd=new PDO('mysql:host=mysql-presdechezvous.alwaysdata.net;dbname=presdechezvous_ok;charset=utf8', '150622_ines', 'presdechezvous', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));	    
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

if ((isset($_POST["email"]) && isset($_POST["motdepass"])) and (!empty($_POST["email"])&& !empty($_POST["motdepass"])))
{	
	//on recupère les variables
	$email=$_POST["email"];
	$motdepass=$_POST["motdepass"];
	$hash_mdp= hash('sha256', $motdepass);
//$nom_admin=$_POST['nom_admin'];
		
	//preparation de la 1ere requete
	$req=$bdd->prepare("SELECT * FROM admin WHERE email_admin=? and motdepass=?");
	//execution de la requete
	$req->execute(array ($email, $hash_mdp));
	$resultat=$req->fetch();
	$nb = $req-> rowCount();
	//echo $nb;

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
			//redidection sur la page accueil admin
			//header ('Location: admin/accueil_admin.php');
			header ('Location: admin/Accueil_admin.php');
		}
		else {
			?>
				<script language='javascript'>
				alert('Votre email et/ou votre mot de passe est erron\u00E9, veuillez reessayer s\'il vous plait.');
				window.location.href='form_prod_admin.php';
				</script>
				<?php
	        }	
		}
	else 
	{
			//preparation de la requete sur la table producteur
			$req1=$bdd->prepare("SELECT * FROM producteur WHERE email_producteur=? and motdepass=?");
			//execution de la requete
			$req1->execute(array ($email, $hash_mdp));
			$resultat1=$req1->fetch();
			$nb1 = $req1-> rowCount();
			//echo $nb1;
			
			//si le client existe dans la base de données
			if($nb1==1)
			{							
			// Utilisation des données.
			$_SESSION['id_producteur']=$resultat1['id_producteur'];
			$_SESSION['nom_producteur']=$resultat1['nom_producteur'];
			$_SESSION['prenom_producteur']=$resultat1['prenom_producteur'];
			$_SESSION['email_producteur']=$resultat1['email_producteur'];
			
			$_SESSION['adresse_producteur']= $resultat1['adresse_producteur'];
			$_SESSION['codepost']=$resultat1['codepost_producteur'];	
			$_SESSION['telephone_producteur']=$resultat1['telephone_producteur'];
			$_SESSION['motdepass']=$resultat1['motdepass'];	
			$_SESSION['photo_producteur']=$resultat1 ['photo_producteur'];
			$_SESSION['type_pers']=$resultat1['type_pers'];

						
				//redidection sur la page accueil admin
				header ('Location: producteur/accueil_producteur.php');
			}
			else
			{
				?>
				<script language='javascript'>
				alert('Votre email et/ou votre mot de passe est erron\u00E9, veuillez reessayer s\'il vous plait.');
				window.location.href='form_prod_admin.php';
				</script>
				<?php
	        }
    }
}
else
{
	?>
		<script language='javascript'>
		alert('Remplir les champs.');
		window.location.href='form_prod_admin.php';
		</script>
	<?php
}
