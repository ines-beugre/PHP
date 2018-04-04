<DOCTYPE html>
<html lang='fr'>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Formulaire producteur</title>
	</head>	
<body>

<table width="300" border="1">
	<tr><form name="Formulaire_producteur" action="verif_prod.php" method="post" accept-charset="UTF-8">
		<td><center> <strong>Se connecter</strong> </center>
			<table width="300" border="0">
				<tr>
				</tr>
				<tr>
					<td>
						<input id="email_producteur" class="form-texte required" placeholder="Adresse email" name="email_producteur" value="" size="60" maxlength="60" type="text">
					</td>
				<tr>
					<td>
						<input id="motdepass" class="form-texte required" placeholder="Mot de passe" name="motdepass" value="" size="60" maxlength="60" type="password">
					</td>
				</tr>				
				
				<tr>
					<td colspan="2">
						<center><button id="edit-submit" class="btn form-submit" type="submit" name="connect_client" value="Se connecter">Se connecter</button></center>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>