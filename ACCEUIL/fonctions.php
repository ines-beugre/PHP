<?php
@session_start();

function issetNotEmpty($var){
    return isset($var) && !empty($var);
}

function getBDD(){
    try
    {
        //$con = new PDO('mysql:host=localhost;dbname=presdechezvous;charset=utf8', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $con = new PDO('mysql:host=mysql-presdechezvous.alwaysdata.net;dbname=presdechezvous_ok;charset=utf8', '150622_ines', 'presdechezvous', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $con;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
        return null;
    }
}

function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
{
	
    //Test1: fichier correctement uploadé
    if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
    
    //Test2: taille limite
    if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
 
    //Test3: extension
    $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
    if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
	
    //Déplacement
    return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
}

///////////////////////////////////


//affichage des elements par liste
function getListeElement($type)
{
	$bdd = getBDD();
	$param = array();
	
	if ($type==1)
	{
    //produit 
    $query = "SELECT * FROM produit ORDER BY nom_produit";
	}
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
//	var_dump ($liste); //permet d'afficher le tablea

   
   $html = '<br/><table class="w3-table w3-striped w3-border" border="1" width="400"><tr>';
    if($type == 0)
	{/*
        $html .= '<td>Selectionner</td>';*/
		$html .= '<td>Nom</td>';
        $html .= '<td>Pr&eacute;nom</td>';
        $html .= '<td>Email</td>';
        
    }
	if($type == 1)
		
	{
        $html .= '<td>Libellé</td>';
        $html .= '<td>Prix</td>';
        $html .= '<td>Quantité</td>';
       /* $html .= '<td>Options</td>';*/
    }
	$html .= '</tr>';
	
		if(count($liste) > 0)
		{
			foreach ($liste as $l) 
			{
				if($type == 0)
				{
					/*
					$html .= '<tr>';              
					$html .= '<td>';			
					if(isset($_SESSION["type_pers"]) && $_SESSION["type_pers"] = 1)
					{
					$html .= '<input type="checkbox" name="producteurcheckbox" id= "'.$l['id_producteur'].'" value="'.$l['id_producteur'].'">';
					}
					*/
					$html .= '<td>'.$l['nom_producteur'].'</td>';
					$html .= '<td>'.$l['prenom_producteur'].'</td>';
					$html .= '<td>'.$l['email_producteur'].'</td>';
					
					$html .= '</td>';
					$html .= '</tr>';
					
				}
				
				if($type == 1)
				{
					$html .= '<tr>';
					$html .= '<td>'.$l['nom_produit'].'</td>';
					$html .= '<td>'.$l['prix_produit'].'</td>';
					$html .= '<td>'.$l['description_produit'].'</td>';
                /*
					$html .= '<td>';
					if(isset($_SESSION["type_pers"]) && $_SESSION["type_pers"] = 1)
					{
					$html .= '<button type="button" class="w3-btn  w3-round w3-orange">Modifier</button>&nbsp;
					<button type="button" onclick="redirect(\'supprimer_producteur.php\');"class="w3-btn  w3-round w3-red">Supprimer</button>';
					}
					$html .= '</td>';
					$html .= '</tr>'; */
				}
			}
	
		}	
	else{
        if($type == 0){
            $html .= '<tr><td class="w3-center" colspan="4">Aucun producteur trouvé</td></tr>';
        }else if ($type == 1){
            $html .= '<tr><td class="w3-center" colspan="4">Aucun produit trouvé</td></tr>';
        }
    }
    $html .= '</table>';	
	
    return $html;
}

///////

//////////////////////////////////////
?>