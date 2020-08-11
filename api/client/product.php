<?php 

header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json");

include_once("../../CORES/initialize.php");





$client = new Client($db);
$result = $client->allProduct();

$num = $result->rowCount();

	if($num > 0){

	$productArray = array();

	$productArray['product'] = array();
		while($row=$result->fetch(PDO::FETCH_ASSOC)){

			extract($row);
			$productItem = array(
		      //'id' => $id,
		      'identifiant'=>$id_produit,
		      'nom_Produit'=>$nom_produit,
		      'description'=>$description,
		      'categorie'=>$categorie,
		      'image'=>$image,
		      'id_vendeur'=>$id_vendeur,
		      'note'=>$note,
		      'prix'=>$prix,
		      'service_livraison'=>json_decode($table_livraison),
		      'delai_livraison'=>$delai_livraison,
		      'zone_livraison'=>json_decode($zone_livraison),
		      'nb_achat'=>$nb_achat,
		      'nb_vue'=>$nb_vue,
		      'statut'=>$statut,
			);

			array_push($productArray['product'], $productItem);
		}

		echo json_encode($productArray);
	}
	else{
       echo json_encode(array('message'=>'Erreur, Pas de reponse', "erreur" => "400"));
	}

?>