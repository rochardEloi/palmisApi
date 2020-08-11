<?php 

header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json");

include_once("../../CORES/initialize.php");



if(isset($_GET['id'])){

	$client = new Client($db);
	$client->id_product = $_GET['id'];
    $result = $client->singleProduct();
    $num = $result->rowCount();

	if($num > 0){

	//$productArray = array();
	//$productArray['singleProduct'] = array();
		while($row=$result->fetch(PDO::FETCH_ASSOC)){

			extract($row);
			$productItem =array(
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

			//array_push($productArray['singleProduct'], $productItem);
			//array_push($productArray, $productItem);
		}

		echo json_encode($productItem);
	}
	else{
       echo json_encode(array('message'=>'Erreur, Identifiant inexistant', "error"=>"400"));
	}
}else{
       echo json_encode(array('message'=>'ID non definie', "error"=>"400"));
}



?>