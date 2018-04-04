<?php

//affichage des elements par liste
function getListeElement($type)
{
	if ($type==1)
	{
    //produit 
    $query = "SELECT * FROM produit ORDER BY nom_produit";
    $bdd = getBDD();
    $param = array();
	}
    if($type == 0){
        $query = "SELECT * FROM producteur ORDER BY nom_producteur, prenom_producteur";
    }
    $stat = $bdd->prepare($query);
    $stat->execute($param);
    return $stat->fetchAll();
	
	if($type == 0) {
		
	}
}

//affichage de la liste dans un tableau des producteur/produit
function displayTableElement($type)
{
    $liste = getListeElement($type);
	
    $html = '<br/><table class="w3-table w3-striped w3-border" border="1" width="400"><tr>';
    if($type = 0)
	{
        $html .= '<td>Nom</td>';
        $html .= '<td>Prénom</td>';
        $html .= '<td>Email</td>';
        $html .= '<td>Options</td>';
    }
	$html .= '</tr>';
	if($type = 1)
	{
        $html .= '<td>Libellé</td>';
        $html .= '<td>Prix</td>';
        $html .= '<td>Quantité</td>';
        $html .= '<td>Options</td>';
    }
	$html .= '</tr>';
	
		if(count($liste) > 0)
		{
			foreach ($liste as $l) 
			{
				$html .= '<tr>';
				if($type = 0)
				{
					$html .= '<td>'.$l['nom_producteur'].'</td>';
					$html .= '<td>'.$l['prenom_producteur'].'</td>';
					$html .= '<td>'.$l['email_producteur'].'</td>';
                
					$html .= '<td>';
					if(isset($_SESSION["type_pers"]) && $_SESSION["type_pers"] = 1)
					{
					$html .= '<button type="button" class="w3-btn  w3-round w3-orange">Modifier</button>&nbsp;
					<button type="button" onclick="redirect(\'supprimer_producteur.php\');"class="w3-btn  w3-round w3-red">Supprimer</button>';
					}
					$html .= '</td>';
				}
					$html .= '</tr>';
        /*
				$html .= '<tr>';
				if($type = 1)
				{
					$html .= '<td>'.$l['nom_produit'].'</td>';
					$html .= '<td>'.$l['prix_produit'].'</td>';
					$html .= '<td>'.$l['description_produit'].'</td>';
                
					$html .= '<td>';
					if(isset($_SESSION["type_pers"]) && $_SESSION["type_pers"] = 1)
					{
					$html .= '<button type="button" class="w3-btn  w3-round w3-orange">Modifier</button>&nbsp;
					<button type="button" onclick="redirect(\'supprimer_producteur.php\');"class="w3-btn  w3-round w3-red">Supprimer</button>';
					}
					$html .= '</td>';
				}
		*/
				$html .= '</tr>';
			}
	
	
	
		}
	else{
        if($type == 0){
            $html .= '<tr><td class="w3-center" colspan="4">Aucun producteur trouvé</td></tr>';
        }else if ($type == 1){
            $html .= '<tr><td class="w3-center" colspan="4">Aucun produit trouvé</td></tr>';
        }
    
    $html .= '</table>';
    return $html;
	}
}

///////
//affichage des elements par liste
function getListeElement($type = 1){
    //produit 
    $query = "SELECT * FROM produit";
    $bdd = getBDD();
    $param = array();
    if($type == 0){
        $query = "SELECT * FROM producteur ORDER BY nom_producteur, prenom_producteur";
    }
    $stat = $bdd->prepare($query);
    $stat->execute($param);
    return $stat->fetchAll();
}


//affichage de la liste dans un tableau des producteur/produit
function displayTableElement($type)
{
    $liste = getListeElement($type);
	
    $html = '<br/><table class="w3-table w3-striped w3-border" border="1" width="400"><tr>';
    if($type = 0)
	{
        $html .= '<td>Nom</td>';
        $html .= '<td>Prénom</td>';
        $html .= '<td>Email</td>';
        $html .= '<td>Options</td>';
    }
	$html .= '</tr>';
	if($type = 1)
	{
        $html .= '<td>Libellé</td>';
        $html .= '<td>Prix</td>';
        $html .= '<td>Quantité</td>';
        $html .= '<td>Options</td>';
    }
	$html .= '</tr>';
	
		if(count($liste) > 0)
		{
			foreach ($liste as $l) 
			{
				$html .= '<tr>';
				if($type = 0)
				{
					$html .= '<td>'.$l['nom_producteur'].'</td>';
					$html .= '<td>'.$l['prenom_producteur'].'</td>';
					$html .= '<td>'.$l['email_producteur'].'</td>';
                
					$html .= '<td>';
					if(isset($_SESSION["type_pers"]) && $_SESSION["type_pers"] = 1)
					{
					$html .= '<button type="button" class="w3-btn  w3-round w3-orange">Modifier</button>&nbsp;
					<button type="button" onclick="redirect(\'supprimer_producteur.php\');"class="w3-btn  w3-round w3-red">Supprimer</button>';
					}
					$html .= '</td>';
				}
					$html .= '</tr>';
        /*
				$html .= '<tr>';
				if($type = 1)
				{
					$html .= '<td>'.$l['nom_produit'].'</td>';
					$html .= '<td>'.$l['prix_produit'].'</td>';
					$html .= '<td>'.$l['description_produit'].'</td>';
                
					$html .= '<td>';
					if(isset($_SESSION["type_pers"]) && $_SESSION["type_pers"] = 1)
					{
					$html .= '<button type="button" class="w3-btn  w3-round w3-orange">Modifier</button>&nbsp;
					<button type="button" onclick="redirect(\'supprimer_producteur.php\');"class="w3-btn  w3-round w3-red">Supprimer</button>';
					}
					$html .= '</td>';
				}
		*/
				$html .= '</tr>';
			}
	
	
	
		}
	else{
        if($type == 0){
            $html .= '<tr><td class="w3-center" colspan="4">Aucun producteur trouvé</td></tr>';
        }else if ($type == 1){
            $html .= '<tr><td class="w3-center" colspan="4">Aucun produit trouvé</td></tr>';
        }
    
    $html .= '</table>';
    return $html;
	}
}

///////
?>