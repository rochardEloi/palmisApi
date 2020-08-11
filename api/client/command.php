<?php

header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With");
include_once("../../CORES/initialize.php");





$command = new Command($db);


$data = json_decode(file_get_contents("php://input"));

$command->id_produit = $data->id_produit;
$command->date = $data->date;
$command->service_livraison = $data->service_livraison;
$command->delai = $data->delai;
$command->email = $data->email;
$command->telephone= $data->telephone;
$command->nom= $data->nom;
$command->prenom= $data->prenom;
$command->nif= $data->nif;
$command->adresse= $data->adresse;
$command->montant= $data->montant;
$command->methode= $data->methode;
$command->statut= $data->statut;

if($command->createCommand()){
	$returned = array();
	$returned["return"] = array();
	array_push($returned["return"], );
	array_push($returned["return"], $data);
	array_push($returned["return"], array('message' => 'Database Update', "Id_command" => $command->id_command));
	echo json_encode($returned);
}
else{

	echo json_encode(array(
       'message' => 'No Update'
	));
}

?>