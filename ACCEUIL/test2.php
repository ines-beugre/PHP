<?php


if(isset($_POST['adresse']) && isset($_POST['distance']) && isset($_POST['distance']) )
	
{	session_start();
	$_SESSION['adresse'] = $_POST['adresse'];
	
	
	$_SESSION['distance']= $_POST['distance'];

	$_SESSION['selection']= $_POST['selection'];
	
	

	header ('location: list_prod2.php');
}



else{


header("Location:produits.php");

}


?>
