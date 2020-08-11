<?php

header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With");
include_once("../CORES/initialize.php");





$post = new Post($db);


$data = json_decode(file_get_contents("php://input"));

$post->id = $data->_id;
$post->nom = $data->nom;
$post->prenom = $data->prenom;
$post->phone = $data->phone;

if($post->update()){

	echo json_encode(array(
       'message' => 'Database Updated'
	));
}
else{

	echo json_encode(array(
       'message' => 'No Update'
	));
}

?>