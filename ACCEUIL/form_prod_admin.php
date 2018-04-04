 <DOCTYPE html>
<html lang='fr'>
<head><title>Formulaire producteur</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
		
	<link rel="stylesheet" type="text/css" href="style.css" />
		
</head>
<body>
		
		<div id="banner1"> PRES DE CHEZ VOUS	</div>
		<div id="menu"></div>
		
		<h1>Bienvenue sur votre espace <b>Producteur<b/></h1>
		<h3>Pour acceder &agrave; votre compte, connectez-vous! <b/></h3>

<center>
<table width="300" border="1">
	<tr><form name="Formulaire" action="verif_prod_admin1.php" method="post" accept-charset="UTF-8"> <!---onsubmit="return verifForm(this)"-->
		<td><center> <strong>Se connecter</strong> </center>
			<table width="300" border="0">
				<tr>
				</tr>
				<tr>
					<td>
						<input id="email" class="form-texte required" placeholder="Adresse email" name="email" value="" size="60" maxlength="60" type="text">
					</td>
				<tr>
					<td>
						<input id="motdepass" class="form-texte required" placeholder="Mot de passe" name="motdepass" value="" size="60" maxlength="60" type="password">
					</td>
				</tr>				
												
				<!--
				<tr>
					<td colspan="2">
						<center><button id="edit-submit" class="btn form-submit" type="submit" name="connect_client" value="Se connecter">Se connecter</button></center>
					</td>
				</tr>
-->
				<tr>
					<td colspan="2">
						<center><button id="edit-submit" class="btn form-submit" type="button" name="connect" onCLick="verifFormPA();"  value="Se connecter">Se connecter</button></center>
					</td>
				</tr>
				
			</table>
		</td>
	</tr>
</table>
</center>

<p/>
<script type="text/javascript" src="producteur/verifForm.js"></script>
<div id="footer">
			<a href="index.html">Accueil</a> 
</div>
</body>
</html>