<?php 

header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json");

include_once("../CORES/initialize.php");





$post = new Post($db);
$result = $post->read();

$num = $result->rowCount();

	if($num > 0){

	$postArray = array();

	$postArray['data'] = array();
		while($row=$result->fetch(PDO::FETCH_ASSOC)){

			extract($row);
			$postItem = array(
		      'id' => $id,
		      'nom'=>$nom,
		      'prenom'=>$prenom,
		       'phone'=>$phone
			);

			array_push($postArray['data'], $postItem);
		}

		echo json_encode($postArray);
	}
	else{
       echo json_encode(array('message'=>'Erreur, Pas de reponse'));
	}

?>