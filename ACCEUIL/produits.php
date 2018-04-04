<!DOCTYPE html>
<html>
  <head>
    <title>	Recherche de produits	</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	
	 <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: {lat: 48.856614, lng: 2.3522219000000177}
        });
        var geocoder = new google.maps.Geocoder();

        document.getElementById('submit').addEventListener('click', function() {
          geocodeAddress(geocoder, map);
        });
      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzEvS9oCS4DgCZo-lJhirTSxxUZENU9Yo&callback=initMap">

    </script>
    <script>
    function copie(){
  
  document.recherche.adresse.value=document.getElementById('address').value;}

    function verifCat()
      {
        var test=false;
        for (var i=1; i<=document.recherche.selection.length; $i++)
          {
            choix=document.getElementById('selection').checked;
              if (choix==true)
                {
              test=true;
            }
    }
     if (test==false)
                {   alert("Saisissez au moins une categorie");
                    location.href="produits.php";
          }
  }

    function verifAdd(){
             if(document.recherche.adresse.value==""){
                alert("Vous n'avez pas saisie d'adresse");
                window.location.href="produits.php";
          }
        }

             
    function verifDist(){             
              if(document.recherche.distance.value < 0 || isNaN(document.recherche.distance.value)==true){

            alert("La valeur de distance saisie est incorrecte");
          
          }
        }
        
        function testcheck(){

          if(verifDist() & verifAdd() & verifCat()){
            document.recherche.submit();
          }
          else{ alert(verifDist()); 
            window.location.href="produits.php";

          }
        }  
        
    </script>


	<link rel="stylesheet" type="text/css" href="style.css" />
   </head>
   
  <body>
 <div id="banner1"> PRES DE CHEZ VOUS </div>

<p id="title"><b>Recherchez-vous des produits? Renseignez les informations ci-après.</b></p>

    <p>Entrez votre adresse:</p>
    <div id="floating-panel">

      <input id="address" type="textbox" class="form-texte required" required placeholder="Entrez une adresse" value="Paris, France" size="40">
      <input id="submit" type="button" onClick="copie();" value="Envoyer">
    </div>
    <div id="map"></div>
   </br>
   <div> 
<?php
    try {
    $bdd=new PDO('mysql:host=mysql-presdechezvous.alwaysdata.net;dbname=presdechezvous_ok', '150622_raisa', 'presdechezvous', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

    //$bdd=new PDO('mysql:host=localhost;dbname=presdechezvous_ok', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));  
  }
  catch (PDOException $e){ 
    echo 'Echec de la connexion:' .$e->getMessage();
    exit;
  }

  $sql="SELECT * FROM categorie";

  $variable = $bdd->query($sql);

 
  ?>

 <form id="form1" action="test2.php" method="POST" name="recherche">


<p><b>Votre adresse est la suivante: </b></p>

    <input name="adresse" type="textbox" class="form-texte required" required placeholder="Votre adresse" value="Paris, France" size="50"><br>

      <p><label><b>Sélectionnez les produits que vous recherchez:</b></label></p>
<?php
  //  $i=1;
 while($row=$variable->fetch(PDO::FETCH_ASSOC)) {

                
    echo '<input type="checkbox" name="selection[]" id="selection" value="'.$row['id_cat'].'">'.$row['nom_cat'].'</br>';

     
 }
?>
<label><b>Dans quel périmètre recherchez vous des produits?</b></label>

   <input type="number" size="10" class="form-texte required" required placeholder="en km" name="distance"/><b>km à la ronde</b>
 </br></br>

    <input class="soumet" type="submit" onClick="testcheck();" value="Rechercher"  /> 


  
    
</form>

 </div> 
<div class="erreur">
   <?php  
     if(isset($_GET['mess'])) {
      $message = isset($_GET['mess']);
      echo "<b><i>".$_GET['mess']."</i></b>";
    }
  ?>
    </div>

<div id="footer">
      <a href="index.html">Accueil</a>  | <a href="mentionslegales.html">Mentions légales</a>  |  <a href="contact.html">Nous contacter</a>
    </div>

  </body>
</html>